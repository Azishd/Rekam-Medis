<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Appointment;

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
        Log::info('Appointment Payload:', ['payload' => json_encode($data, JSON_PRETTY_PRINT)]);

        // Send request to SATUSEHAT API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->post('https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Appointment', $data);

        // Log the response status and body
        Log::info('API Response', ['status' => $response->status(), 'body' => $response->body()]);

        // Send logs and response status back to the browser
        return response()->json([
            'status' => $response->status(),
            'response' => $response->json(),
            'log' => 'Check storage/logs/laravel.log for more details'
        ]);
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
}
