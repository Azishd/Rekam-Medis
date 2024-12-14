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
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('API_CLIENT_ID'),
            'Content-Type' => 'application/json',
        ])->post(env('API_BASE_URL') . '/Patient', [
            "identifier_value" => "123456789",
            "family_name" => "Doe",
            "given_name" => "John",
            "gender" => "male",
            "birth_date" => "1985-01-01",
        ]);
        
        if ($response->successful()) {
            $this->info('Patient created successfully:');
            $this->line(json_encode($response->json(), JSON_PRETTY_PRINT));
        } else {
            $this->error('Failed to create patient:');
            $this->line(json_encode($response->json(), JSON_PRETTY_PRINT));
        }
    }
}
