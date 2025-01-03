<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SatusehatService;

class CreateDummyPatient extends Command
{
    protected $signature = 'create:dummy-patient';
    protected $description = 'Create a dummy patient using the API';

    protected $satusehatService;

    public function __construct(SatusehatService $satusehatService)
    {
        parent::__construct();
        $this->satusehatService = $satusehatService;
    }

    public function handle()
    {
        $accessToken = $this->satusehatService->getAccessToken();

        if (!$accessToken) {
            $this->error('Failed to fetch access token');
            return;
        }

        $patients = [
            [
                'nik' => '92710603120004',
                'name' => ['family' => 'Ardianto', 'given' => ['Putra']],
                'gender' => 'male',
                'birthDate' => '1992-01-09',
            ],
            // Add more patients...
        ];

        foreach ($patients as $patient) {
            // Check if the patient already exists
            $existingPatient = $this->satusehatService->getPatientByNIK($accessToken, $patient['nik']);
            
            if (isset($existingPatient['entry']) && count($existingPatient['entry']) > 0) {
                $this->info('Patient already exists: ' . $patient['nik']);
                continue; // Skip creating this patient
            }

            // Proceed to create patient if not found
            $response = $this->satusehatService->createPatient($accessToken, $patient);
            $this->info('Response: ' . json_encode($response));
        }
    }
}
