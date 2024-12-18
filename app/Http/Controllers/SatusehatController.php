<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class SatusehatController extends Controller
{
    public function getPatients()
    {
        // Step 1: Get Access Token
        $authResponse = Http::asForm()->post(env('AUTH_URL') . '/accesstoken?grant_type=client_credentials', [
            'client_id' => env('API_CLIENT_ID'),
            'client_secret' => env('API_SECRET'),
            'scope' => 'patient/Patient.read',
        ]);

        if (!$authResponse->successful()) {
            $this->error("Failed to fetch access token: " . $authResponse->body());
            return;
        }

        $accessToken = $authResponse->json('access_token');
        Log::info("Access token fetched successfully: " . $accessToken);

        // Step 2: Get List of Patients
        $url = env('API_BASE_URL') . '/Patient';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            Log::info("Error Status: " . $response->status());  // Log the HTTP status code
            Log::info("Response Body: " . $response->body());  // Log the full response body
            return response()->json([
                'error' => 'Failed to retrieve patient data',
                'status' => $response->status(),
                'message' => $response->body()
            ], 400);
        }
    }

    public function getPatientByNIK($nik)
    {
        // Step 1: Get Access Token
        $authResponse = Http::asForm()->post(env('AUTH_URL') . '/accesstoken?grant_type=client_credentials', [
            'client_id' => env('API_CLIENT_ID'),
            'client_secret' => env('API_SECRET'),
            'scope' => 'patient/Patient.read',
        ]);

        if (!$authResponse->successful()) {
            Log::error('Failed to fetch access token', ['response' => $authResponse->body()]);
            return response()->json(['error' => 'Failed to fetch access token'], 400);
        }

        $accessToken = $authResponse->json('access_token');
        Log::info('Access Token Retrieved', ['access_token' => $accessToken]);

        // Step 2: Query Patient by NIK
        $url = env('API_BASE_URL') . '/Patient';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get($url, [
            'identifier' => 'https://fhir.kemkes.go.id/id/nik|' . $nik,
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            Log::error('Failed to retrieve patient data', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);
            return response()->json([
                'error' => 'Failed to retrieve patient data',
                'status' => $response->status(),
                'message' => $response->body(),
            ], 403);
        }
    }
}

