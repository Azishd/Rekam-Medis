<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class SatusehatController extends Controller
{
    /**
     * Get Access Token
     */
    private function getAccessToken()
    {
        if (Cache::has('satusehat_access_token')) {
            return Cache::get('satusehat_access_token');
        }

        $authResponse = Http::asForm()->post(env('AUTH_URL') . '/accesstoken?grant_type=client_credentials', [
            'client_id' => env('API_CLIENT_ID'),
            'client_secret' => env('API_SECRET'),
            'scope' => 'patient/Patient.read',
        ]);

        if (!$authResponse->successful()) {
            Log::error('Failed to fetch access token', ['response' => $authResponse->body()]);
            return null;
        }

        $accessToken = $authResponse->json('access_token');
        Cache::put('satusehat_access_token', $accessToken, 3600);

        return $accessToken;
    }

    /**
     * Get Patient by NIK
     */
    public function getPatientByNIK($nik)
    {
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return response()->json(['error' => 'Unable to authenticate with SATUSEHAT API'], 500);
        }

        $url = env('API_BASE_URL') . '/Patient';
        $query = [
            'identifier' => 'https://fhir.kemkes.go.id/id/nik|' . $nik,
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get($url, $query);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            Log::error('Failed to retrieve patient by NIK', [
                'nik' => $nik,
                'status' => $response->status(),
                'response' => $response->body(),
            ]);

            return response()->json([
                'error' => 'Failed to retrieve patient data',
                'status' => $response->status(),
                'message' => $response->body(),
            ], $response->status());
        }
    }

    /**
     * Get Patient by Name, Birthdate, and Gender
     */
    public function getPatientByDetails(Request $request)
    {
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return response()->json(['error' => 'Unable to authenticate with SATUSEHAT API'], 500);
        }

        $url = env('API_BASE_URL') . '/Patient';
        $query = [
            'name' => $request->input('name'),
            'birthdate' => $request->input('birthdate'),
            'gender' => $request->input('gender'),
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get($url, $query);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            Log::error('Failed to retrieve patient by details', [
                'query' => $query,
                'status' => $response->status(),
                'response' => $response->body(),
            ]);

            return response()->json([
                'error' => 'Failed to retrieve patient data',
                'status' => $response->status(),
                'message' => $response->body(),
            ], $response->status());
        }
    }
    
    public function addPatient(Request $request)
    {
        // Step 1: Get Access Token
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return response()->json(['error' => 'Unable to authenticate with SATUSEHAT API'], 500);
        }

        // Step 2: Define Endpoint and Headers
        $url = env('API_BASE_URL') . '/Patient';
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ];

        // Step 3: Create Payload
        $payload = [
            'resourceType' => 'Patient',
            'identifier' => [
                [
                    'use' => 'official',
                    'system' => 'https://fhir.kemkes.go.id/id/nik',
                    'value' => $request->input('nik'),
                ],
                // Tambahkan data identifier lainnya jika diperlukan
            ],
            'name' => [
                [
                    'use' => 'official',
                    'family' => $request->input('last_name'),
                    'given' => [$request->input('first_name')],
                ],
            ],
            'gender' => $request->input('gender'),
            'birthDate' => $request->input('birthdate'),
            // Tambahkan properti lain sesuai kebutuhan
        ];

        // Step 4: Send POST Request
        $response = Http::withHeaders($headers)->post($url, $payload);

        // Step 5: Handle Response
        if ($response->successful()) {
            $responseData = $response->json();
            $patientId = $responseData['id'] ?? null;

            return response()->json([
                'message' => 'Patient data added successfully',
                'patient_id' => $patientId,
            ], 201);
        } else {
            Log::error('Failed to add patient', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);

            return response()->json([
                'error' => 'Failed to add patient data',
                'status' => $response->status(),
                'message' => $response->body(),
            ], $response->status());
        }
    }

}
