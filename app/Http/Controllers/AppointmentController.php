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
            'patient_id' => 'required|string', // Ensure patient ID follows the FHIR format
            'patient_name' => 'required|string',
            'appointment_date' => 'required|date',
            'doctor_id' => 'required|string', // Ensure doctor ID follows the FHIR format
            'doctor_name' => 'required|string',
            'service_request_id' => 'required|string', // Required for "basedOn"
            'slot_id' => 'required|string' // Required for slot reference
        ]);

        // Get access token
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return back()->withErrors(['msg' => 'Failed to retrieve access token.']);
        }

        // Prepare FHIR-compliant payload
        $data = [
            "resourceType" => "Appointment",
            "identifier" => [
                [
                    "system" => "http://sys-ids.kemkes.go.id/cha-appointment",
                    "value" => uniqid() // Generate unique ID for the appointment
                ]
            ],
            "status" => "proposed", // Default status
            "appointmentType" => [
                "coding" => [
                    [
                        "system" => "http://terminology.hl7.org/CodeSystem/v2-0276",
                        "code" => "ROUTINE",
                        "display" => "Routine appointment"
                    ]
                ]
            ],
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
            "created" => now()->toIso8601String(), // Ensure correct date format
            "participant" => [
                [
                    "actor" => [
                        "reference" => "Patient/" . $validatedData['patient_id'],
                        "display" => $validatedData['patient_name']
                    ],
                    "status" => "accepted"
                ],
                [
                    "actor" => [
                        "reference" => "HealthcareService/" . $validatedData['doctor_id'],
                        "display" => $validatedData['doctor_name']
                    ],
                    "status" => "needs-action"
                ]
            ]
        ];

        // Send request to SATUSEHAT API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->post('https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Appointment', $data);

        // Handle response
        if ($response->successful()) {
            return redirect()->route('appointment')->with('success', 'Appointment created successfully');
        } else {
            Log::error('Failed to create appointment', ['response' => $response->body()]);
            return back()->withErrors(['msg' => 'Error: ' . $response->status()]);
        }
    }

    // Verify the appointment (PUT)
    public function verify(Request $request)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return back()->withErrors(['msg' => 'Failed to retrieve access token.']);
        }

        $data = [
            'status' => $request->submit_button == 'accept' ? 'accepted' : 'rejected'
        ];

        $appointment = Appointment::find($request->id);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->put("https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Appointment/{$appointment->id}", $data);

        if ($response->successful()) {
            return redirect()->route('appointments.index')
                             ->with('success', 'Appointment updated successfully');
        } else {
            Log::error('Failed to update appointment', ['response' => $response->body()]);
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
}
