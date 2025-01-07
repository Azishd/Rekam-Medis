@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="flex flex-col rounded-2xl p-5 max-md:h-screen h-[92vh] relative" style="background-color: white;">
            <h1 class="text-2xl font-bold mb-2" style="color: #070A52;">Add Medical Record</h1>

            <form action="{{ route('medical-records.store') }}" method="POST">
                @csrf
                
                <!-- ID Field -->
                <div class="mb-4">
                    <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
                    <input type="text" id="id" name="id" value="{{ old('id') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" readonly>
                </div>

                <div class="mb-4">
                    <label for="patient_id" class="block text-sm font-medium text-gray-700">Patient</label>
                    <select id="patient_id" name="patient_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="doctor_id" class="block text-sm font-medium text-gray-700">Doctor</label>
                    <select id="doctor_id" name="doctor_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="diagnosis" class="block text-sm font-medium text-gray-700">Diagnosis</label>
                    <textarea id="diagnosis" name="diagnosis" rows="3" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
                </div>

                <div class="mb-4">
                    <label for="prescription" class="block text-sm font-medium text-gray-700">Prescription</label>
                    <textarea id="prescription" name="prescription" rows="3" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
                </div>

                <!-- Actions -->
                <div class="mb-4">
                    <label for="actions" class="block text-sm font-medium text-gray-700">Actions</label>
                    <textarea id="actions" name="actions" rows="3" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-indigo-500 px-4 py-2 text-white rounded-md hover:bg-indigo-700">
                        Save Record
                    </button>
                    <a href="{{ route('medical-records.index') }}">
                        <button type="button" class="bg-red-500 px-4 py-2 text-white rounded-md hover:bg-red-700">
                            Cancel
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
