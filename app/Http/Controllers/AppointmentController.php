<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    // Fetch appointments for the current user (GET)
    public function index()
    {
        $appointments = Appointment::paginate(10); // Adjust pagination as necessary
        return view('appointment.index', compact('appointments'));
    }

    public function show($id)
    {
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return response()->json(['error' => 'Failed to retrieve access token'], 401);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->get("https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Appointment/{$id}");

        // Check if the response was successful (HTTP 200)
        if ($response->successful()) {
            return response()->json([
                'resourceType' => 'Appointment',
                'id' => $response->json('id'),
                'status' => $response->json('status'),
                'appointmentType' => $response->json('appointmentType'),
                'basedOn' => $response->json('basedOn'),
                'slot' => $response->json('slot'),
                'created' => $response->json('created'),
                'participant' => $response->json('participant')
            ]);
        } else {
            // Handle errors with specific message based on the response status
            return response()->json([
                'error' => 'Appointment not found',
                'status' => $response->status(),
                'message' => $response->body()
            ], $response->status());
        }
    }


    // Show the form to create a new appointment (GET)
    public function create()
    {
        return view('appointment.create');
    }

    // Store a new appointment (POST)
    public function store(Request $request)
    {
        // Validate required fields
        $validatedData = $request->validate([
            'patient_id' => 'required|string',
            'appointment_date' => 'required|date',
            'doctor_id' => 'required|string',
            'service_request_id' => 'required|string',
            'slot_id' => 'required|string'
        ]);
    
        // Get access token
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return back()->withErrors(['msg' => 'Failed to retrieve access token.']);
        }
    
        // Prepare the FHIR-compliant payload
        $data = [
            "resourceType" => "Appointment",
            "status" => "booked",
            "basedOn" => [
                [
                    "reference" => "ServiceRequest/" . $validatedData['service_request_id']
                ]
            ],
            "slot" => [
                [
                    "reference" => "Slot/" . $validatedData['slot_id']
                ]
            ],
            "participant" => [
                [
                    "actor" => [
                        "reference" => "Patient/" . $validatedData['patient_id']
                    ],
                    "status" => "accepted"
                ],
                [
                    "actor" => [
                        "reference" => "Practitioner/" . $validatedData['doctor_id']
                    ],
                    "status" => "accepted"
                ]
            ],
            "start" => date('c', strtotime($validatedData['appointment_date'])),
            "end" => date('c', strtotime($validatedData['appointment_date'] . ' +30 minutes'))
        ];
    
        // Log the request payload before sending
        \Log::info('Appointment Payload:', ['payload' => json_encode($data, JSON_PRETTY_PRINT)]);

        // Send request to SATUSEHAT API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->post('https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Appointment', $data);

        \Log::info('API Response', ['status' => $response->status(), 'body' => $response->body()]);

        // Return logs as JSON response instead of redirecting
        return response()->json([
            'status' => $response->status(),
            'response' => $response->json(),
            'log' => 'Check storage/logs/laravel.log for more details'
        ]);

        // If successful, show logs on the page
        if ($response->successful()) {
            $logInfo = \Log::getLogs();  // You would need a method to get the latest logs or custom logs.
            return view('appointment.create', ['logInfo' => $logInfo, 'success' => 'Appointment created successfully']);
        } else {
            \Log::error('Failed to create appointment', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            return back()->withErrors(['msg' => 'Error: ' . $response->status()]);
        }
    }

    // Function to get the access token (You can add your actual implementation here)
    private function getAccessToken()
    {
        $authResponse = Http::asForm()->post(env('AUTH_URL') . '/accesstoken?grant_type=client_credentials', [
            'client_id' => env('API_CLIENT_ID'),
            'client_secret' => env('API_SECRET'),
        ]);

        if ($authResponse->successful()) {
            return $authResponse->json('access_token');
        }

        Log::error('Failed to fetch access token', ['response' => $authResponse->body()]);
        return null;
    }

    public function createSlot()
    {
        return view('slot.create_slot');
    }

    // Method to create a new slot
    public function storeSlot(Request $request)
    {
        Log::info('Form Data:', $request->all());

        // Validate the input data
        $validatedData = $request->validate([
            'start' => 'required|date',  // Ensure a valid date
            'end' => 'required|date|after:start',  // Ensure the end date is after the start
            'practitioner_id' => 'required|integer',  // Ensure a valid practitioner ID
            'service_type_code' => 'required|string',  // Ensure a valid service type code
        ]);
    
        // Get access token (similar to your previous method)
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return back()->withErrors(['msg' => 'Failed to retrieve access token.']);
        }
    
        $startDate = Carbon::parse($validatedData['start'])->toIso8601String();
        $endDate = Carbon::parse($validatedData['end'])->toIso8601String();

        // Prepare the data for the Slot
        $data = [
            'resourceType' => 'Slot',
            'status' => 'free',  // Slot status
            'start' => $startDate,  // Slot start time
            'end' => $endDate,  // Slot end time
            'schedule' => [
                'reference' => 'Schedule/schedule-id-12345',  // Reference to the Schedule resource
            ],
            'serviceType' => [  // Ensure it's an array
                [
                    'coding' => [
                        [
                            'system' => 'http://terminology.hl7.org/CodeSystem/service-type',
                            'code' => $validatedData['service_type_code'],
                            'display' => 'General Consultation',  // Modify as necessary
                        ]
                    ]
                ]
            ]
        ];
    
        // Send POST request to create the slot
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->post('https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Slot', $data);
    
        // Log the response for debugging
        Log::info('Slot Creation Response', [
            'status' => $response->status(),
            'body' => $response->body()
        ]);
    
        // Handle the response
        if ($response->successful()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Slot created successfully!',
                'data' => $response->json()
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create slot',
                'error' => $response->json()
            ]);
        }
    
        // Optional: Redirect back to the form with a success message
        return redirect()->route('create.slot')->with('success', 'Slot created successfully!');
    }

    public function checkSlotStatus($slotId)
    {
        // Replace with your actual access token
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return response()->json(['error' => 'Failed to retrieve access token'], 401);
        }

        // Fetch slot details from SATUSEHAT API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->get("https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Slot/{$slotId}");

        // Check if the response is successful
        if ($response->successful()) {
            // Get the slot status from the response
            $slotStatus = $response->json('status');

            // Log the slot status (optional)
            Log::info("Slot ID: {$slotId} - Status: {$slotStatus}");

            // Return the status as a response
            if ($slotStatus === 'free') {
                return response()->json([
                    'status' => 'success',
                    'message' => 'The slot is available for booking.',
                    'slot_status' => $slotStatus,
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The slot is not available.',
                    'slot_status' => $slotStatus,
                ]);
            }
        } else {
            // If the request failed, log and return the error
            Log::error("Failed to retrieve slot {$slotId}. Status: " . $response->status());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve slot information.',
                'error' => $response->body(),
            ], 500);
        }
    }
    
}
