@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="flex flex-col rounded-2xl p-5 max-md:h-screen h-[92vh] relative" style="background-color: white;">
            <h1 class="text-2xl font-bold mb-2" style="color: #070A52;">Patient Details</h1>

            <div class="mb-4">
                <p><strong>Full Name:</strong> {{ $patient['resource']['name'][0]['text'] ?? 'No Name Available' }}</p>
                <p><strong>Email:</strong> {{ $patient['resource']['email'] ?? 'No Email Available' }}</p>
                <p><strong>Address:</strong> {{ $patient['resource']['address'] ?? 'No Address Available' }}</p>
                <p><strong>Phone:</strong> {{ $patient['resource']['phone'] ?? 'No Phone Available' }}</p>
                <p><strong>Gender:</strong> {{ ucfirst($patient['resource']['gender'] ?? 'unknown') }}</p>
                <p><strong>Age:</strong> {{ $patient['resource']['age'] ?? 'No Age Available' }}</p>
            </div>
            
            

            <a href="{{ route('get.patient.form') }}" class="bg-indigo-500 px-4 py-2 text-white rounded-md hover:bg-indigo-700">
                Back to Search
            </a>
        </div>
    </div>
</div>
@endsection
