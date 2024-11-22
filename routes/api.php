<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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
    Route::get('/data', function () {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('API_CLIENT_ID'),
        ])->get(env('API_BASE_URL') . '/fhir-r4/v1'); // Replace '/data-endpoint' with the actual API endpoint

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Unable to fetch data'], $response->status());
    });

    Route::post('/data', function (Request $request) {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('API_CLIENT_ID'),
        ])->post(env('API_BASE_URL') . '/fhir-r4/v1', $request->all()); // Replace '/data-endpoint' with the correct endpoint

        if ($response->successful()) {
            return response()->json(['message' => 'Data sent successfully', 'data' => $response->json()]);
        }

        return response()->json(['error' => 'Unable to send data'], $response->status());
    });
});
