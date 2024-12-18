<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateDummyPatient extends Command
{
    protected $signature = 'create:dummy-patient';
    protected $description = 'Create a dummy patient using the API';

    public function handle()
    {
        // Step 1: Get Access Token
        $authResponse = Http::asForm()->post(env('AUTH_URL') . '/accesstoken?grant_type=client_credentials', [
            'client_id' => env('API_CLIENT_ID'),
            'client_secret' => env('API_SECRET'),
        ]);

        if (!$authResponse->successful()) {
            $this->error("Failed to fetch access token: " . $authResponse->body());
            return;
        }

        $accessToken = $authResponse->json('access_token');
        $this->info("Access token fetched successfully: " . $accessToken);

        // Step 2: Create Dummy Patient
        $patients = [
            [
                'nik' => '9271060312000001',
                'name' => ['family' => 'Ardianto', 'given' => ['Putra']],
                'gender' => 'male',
                'birthDate' => '1992-01-09',
            ],
            [
                'nik' => '9204014804000002',
                'name' => ['family' => 'Claudia', 'given' => ['Sintia']],
                'gender' => 'female',
                'birthDate' => '1989-11-03',
            ],
            // Add other patients here...
        ];

        foreach ($patients as $patient) {
            $this->createPatient($accessToken, $patient);
        }
    }

    private function createPatient($accessToken, $patient)
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

        if ($response->successful()) {
            $this->info('Patient created successfully: ' . $patient['nik']);
            $this->line(json_encode($response->json(), JSON_PRETTY_PRINT));
        } else {
            $this->error('Failed to create patient: ' . $patient['nik']);
            $this->line(json_encode($response->json(), JSON_PRETTY_PRINT));
        }
    }
}