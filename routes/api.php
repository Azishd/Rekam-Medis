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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test-api-connection', function () {
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('API_CLIENT_ID'),
    ])->get(env('API_BASE_URL') . '/status'); // Replace '/status' with the actual test endpoint

    if ($response->successful()) {
        return response()->json(['message' => 'Connection successful', 'data' => $response->json()]);
    } else {
        return response()->json(['message' => 'Connection failed', 'status' => $response->status()], $response->status());
    }
});