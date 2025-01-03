<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SatusehatService
{
    public function getAccessToken()
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

    public function createPatient($accessToken, $patient)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->post(env('API_BASE_URL') . '/Patient', [
            'identifier' => [
                [
                    'system' => 'https://fhir.kemkes.go.id/id/nik',
                    'value' => $patient['nik'],
                ],
            ],
            'name' => [
                [
                    'use' => 'official',
                    'family' => $patient['name']['family'],
                    'given' => $patient['name']['given'],
                ],
            ],
            'gender' => $patient['gender'],
            'birthDate' => $patient['birthDate'],
            'address' => [
                [
                    'line' => ['Jl. Raya No. 123'],
                    'city' => 'Jakarta',
                    'postalCode' => '12345',
                ],
            ],
        ]);

        return $response->json();
    }

    public function getPatientByNIK($accessToken, $nik)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->get(env('API_BASE_URL') . '/Patient', [
            'identifier' => 'https://fhir.kemkes.go.id/id/nik|' . $nik,
        ]);

        return $response->json();
    }

}
