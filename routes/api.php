<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('satu-sehat')->group(function () {
    Route::get('/patient/{identifier}', function ($identifier) {
        $accessToken = 'L7ljwlg5N3I4PDFcVU9QFAVn7g5Z';
        
        $url = env('API_BASE_URL') . "/Patient?identifier=" . $identifier;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('API_ACCESS_TOKEN'),
            'Content-Type' => 'application/json',
        ])->get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json([
            'error' => 'Unable to fetch data',
            'status' => $response->status(),
            'body' => $response->body(),
        ], $response->status());
    });

    Route::post('/patient', function (Request $request) {
        $accessToken = 'L7ljwlg5N3I4PDFcVU9QFAVn7g5Z';
        
        $url = env('API_BASE_URL') . "/Patient";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('API_ACCESS_TOKEN'),
            'Content-Type' => 'application/json',
        ])->post($url, [
            "resourceType" => "Patient",
            "identifier" => [
                [
                    "use" => "usual",
                    "value" => $request->identifier_value,
                ],
            ],
            "name" => [
                [
                    "use" => "official",
                    "family" => $request->family_name,
                    "given" => [$request->given_name],
                ],
            ],
            "gender" => $request->gender,
            "birthDate" => $request->birth_date,
        ]);

        if ($response->successful()) {
            return response()->json(['message' => 'Patient created successfully', 'data' => $response->json()]);
        }

        return response()->json([
            'error' => 'Unable to create patient',
            'status' => $response->status(),
            'body' => $response->body(),
        ], $response->status());
    });

    Route::get('/patient', function () {
        return response()->json(['message' => 'Please specify a patient identifier or use POST for creating a patient.']);
    });
});
