@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="flex flex-col rounded-2xl p-5 max-md:h-screen h-[92vh] relative" style="background-color: white;">
            <h1 class="text-2xl font-bold mb-2" style="color: #070A52;">Create Appointment</h1>

            <!-- Form for Creating Appointment -->
            <form action="{{ route('appointment.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="patient_id" class="block text-gray-700 font-bold">Patient ID (FHIR)</label>
                    <input type="text" id="patient_id" name="patient_id" class="border border-gray-300 rounded-lg w-full p-2" required>
                </div>

                <div class="mb-4">
                    <label for="patient_name" class="block text-gray-700 font-bold">Patient Name</label>
                    <input type="text" id="patient_name" name="patient_name" class="border border-gray-300 rounded-lg w-full p-2" required>
                </div>

                <div class="mb-4">
                    <label for="appointment_date" class="block text-gray-700 font-bold">Appointment Date</label>
                    <input type="datetime-local" id="appointment_date" name="appointment_date" class="border border-gray-300 rounded-lg w-full p-2" required>
                </div>

                <div class="mb-4">
                    <label for="doctor_id" class="block text-gray-700 font-bold">Doctor ID (FHIR)</label>
                    <input type="text" id="doctor_id" name="doctor_id" class="border border-gray-300 rounded-lg w-full p-2" required>
                </div>

                <div class="mb-4">
                    <label for="doctor_name" class="block text-gray-700 font-bold">Doctor Name</label>
                    <input type="text" id="doctor_name" name="doctor_name" class="border border-gray-300 rounded-lg w-full p-2" required>
                </div>

                <div class="mb-4">
                    <label for="service_request_id" class="block text-gray-700 font-bold">Service Request ID</label>
                    <input type="text" id="service_request_id" name="service_request_id" class="border border-gray-300 rounded-lg w-full p-2" required>
                </div>

                <div class="mb-4">
                    <label for="slot_id" class="block text-gray-700 font-bold">Slot ID</label>
                    <input type="text" id="slot_id" name="slot_id" class="border border-gray-300 rounded-lg w-full p-2" required>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Create Appointment
                </button>
            </form>
        </div>
    </div>
</div>
@endsection