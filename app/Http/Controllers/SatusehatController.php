<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SatusehatController extends Controller
{
    public function getAccessToken()
    {
        $response = Http::asForm()->post(env('AUTH_URL') . '/accesstoken?grant_type=client_credentials', [
            'client_id' => env('CLIENT_ID'),
            'client_secret' => env('CLIENT_SECRET'),
        ]);

        if ($response->successful()) {
            $accessToken = $response->json()['access_token'];
            return $accessToken;
        } else {
            return response()->json(['error' => 'Failed to fetch access token'], 400);
        }
    }

    public function getPatients()
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return response()->json(['error' => 'Invalid access token'], 400);
        }

        // Get Patient data
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get(env('BASE_URL') . '/Patient');

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Failed to retrieve patient data'], 400);
        }
    }
}
