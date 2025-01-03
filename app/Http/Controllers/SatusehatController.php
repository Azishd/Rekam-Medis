<?php

namespace App\Http\Controllers;

use App\Services\SatusehatService;
use Illuminate\Http\Request;

class SatusehatController extends Controller
{
    protected $satusehatService;

    public function __construct(SatusehatService $satusehatService)
    {
        $this->satusehatService = $satusehatService;
    }

    public function createPatient(Request $request)
    {
        $accessToken = $this->satusehatService->getAccessToken();

        if (!$accessToken) {
            return response()->json(['error' => 'Failed to fetch access token'], 400);
        }

        $response = $this->satusehatService->createPatient($accessToken, $request->all());

        return response()->json($response);
    }

    public function getPatientByNIK(Request $request)
    {
        $nik = $request->input('nik');
    
        if (!$nik) {
            return response()->json(['error' => 'NIK is required'], 400);
        }
    
        $accessToken = $this->satusehatService->getAccessToken();
    
        if (!$accessToken) {
            return response()->json(['error' => 'Failed to fetch access token'], 400);
        }
    
        $response = $this->satusehatService->getPatientByNIK($accessToken, $nik);
    
        if (isset($response['entry']) && count($response['entry']) > 0) {
            return response()->json($response['entry']);
        } else {
            return response()->json(['message' => 'No patient found for the given NIK'], 404);
        }
    }
}
