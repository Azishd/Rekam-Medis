<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    public function index()
{
    $accessToken = $this->getAccessToken();

    if (!$accessToken) {
        return response()->json(['error' => 'Unable to retrieve access token'], 500);
    }

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $accessToken,
        'Content-Type' => 'application/json',
    ])->get('https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Appointment');

    if ($response->successful()) {
        return response()->json($response->json());
    }

    return response()->json(['error' => 'Failed to fetch appointments'], $response->status());
}
    // Function to get the access token
    private function getAccessToken()
    {
        $authResponse = Http::asForm()->post(env('https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/accesstoken?grant_type=client_credentials
') . '/accesstoken?grant_type=client_credentials', [
            'client_id' => env('B1GAAIamySZrQYCJbW6ujGS9GQloH4ApAuhfA9HaiILR5fG0'),
            'client_secret' => env('AUpXrf7P6ET2gdaPzASw7pPIcordWAmniFAMovcBP5lCiqX6oMB0H1hqjYmzZ7gN'),
        ]);

        if ($authResponse->successful()) {
            return $authResponse->json('access_token');
        }

        Log::error('Failed to fetch access token', ['response' => $authResponse->body()]);
        return null;
    }

    // Show details of an appointment (GET)
    public function show($id)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return back()->withErrors(['msg' => 'Failed to retrieve access token.']);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->get("https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Appointment/{$id}");

        if ($response->successful()) {
            $appointmentData = $response->json();
            return view('appointment_details', ['appointment' => $appointmentData]);
        } else {
            Log::error('Failed to fetch appointment details', ['response' => $response->body()]);
            return back()->withErrors(['msg' => 'Error: ' . $response->status()]);
        }
    }

    // Show the form to create a new appointment (GET)
    public function create()
    {
        return view('appointment_create');
    }

    // Store a new appointment (POST)
    public function store(Request $request)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return back()->withErrors(['msg' => 'Failed to retrieve access token.']);
        }

        $data = [
            'resourceType' => 'Appointment',
            'patientName' => $request->input('patient_name'),
            'appointmentDate' => $request->input('appointment_date'),
            'doctorName' => $request->input('doctor_name'),
            // Add other fields as needed
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->post('https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Appointment', $data);

        if ($response->successful()) {
            $appointmentData = $response->json();
            return redirect()->route('appointments.show', ['id' => $appointmentData['id']])
                             ->with('success', 'Appointment created successfully');
        } else {
            Log::error('Failed to create appointment', ['response' => $response->body()]);
            return back()->withErrors(['msg' => 'Error: ' . $response->status()]);
        }
    }

    // Show the form to edit an appointment (GET)
    public function edit($id)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return back()->withErrors(['msg' => 'Failed to retrieve access token.']);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->get("https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Appointment/{$id}");

        if ($response->successful()) {
            $appointmentData = $response->json();
            return view('appointment_edit', ['appointment' => $appointmentData]);
        } else {
            Log::error('Failed to fetch appointment details', ['response' => $response->body()]);
            return back()->withErrors(['msg' => 'Error: ' . $response->status()]);
        }
    }

    // Update an existing appointment (PUT)
    public function update(Request $request, $id)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return back()->withErrors(['msg' => 'Failed to retrieve access token.']);
        }

        $data = [
            'resourceType' => 'Appointment',
            'id' => $id,
            'patientName' => $request->input('patient_name'),
            'appointmentDate' => $request->input('appointment_date'),
            'doctorName' => $request->input('doctor_name'),
            // Add other fields as needed
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->put("https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1/Appointment/{$id}", $data);

        if ($response->successful()) {
            $appointmentData = $response->json();
            return redirect()->route('appointments.show', ['id' => $appointmentData['id']])
                             ->with('success', 'Appointment updated successfully');
        } else {
            Log::error('Failed to update appointment', ['response' => $response->body()]);
            return back()->withErrors(['msg' => 'Error: ' . $response->status()]);
        }
    }
}
