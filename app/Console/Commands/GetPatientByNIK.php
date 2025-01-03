<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SatusehatService;

class GetPatientByNIK extends Command
{
    protected $signature = 'get:patient-by-nik {nik}';
    protected $description = 'Get patient data by NIK';
    protected $satusehatService;

    public function __construct(SatusehatService $satusehatService)
    {
        parent::__construct();
        $this->satusehatService = $satusehatService;
    }

    public function handle()
    {
        $nik = $this->argument('nik');

        $accessToken = $this->satusehatService->getAccessToken();

        if (!$accessToken) {
            $this->error('Failed to fetch access token');
            return;
        }

        $response = $this->satusehatService->getPatientByNIK($accessToken, $nik);

        if (isset($response['entry']) && count($response['entry']) > 0) {
            $this->info('Patient data:');
            $this->line(json_encode($response['entry'], JSON_PRETTY_PRINT));
        } else {
            $this->error('No patient found for the given NIK');
        }
    }
}
