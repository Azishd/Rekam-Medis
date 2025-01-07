@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="flex flex-col rounded-2xl p-5 max-md:h-screen h-[92vh] relative" style="background-color: white;">
            <h1 class="text-2xl font-bold mb-2" style="color: #070A52;">Medical Records</h1>

            <div class="mb-4 text-right">
                <a href="{{ route('medical-records.create') }}">
                    <button class="bg-indigo-500 px-4 py-2 text-white rounded-md hover:bg-indigo-700">
                        Add New Record
                    </button>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr style="background-color: #f4f4f4;">
                            <th class="px-4 py-2 border border-gray-300">ID</th>
                            <th class="px-4 py-2 border border-gray-300">Patient</th>
                            <th class="px-4 py-2 border border-gray-300">Doctor</th>
                            <th class="px-4 py-2 border border-gray-300">Diagnosis</th>
                            <th class="px-4 py-2 border border-gray-300">Prescription</th>
                            <th class="px-4 py-2 border border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                        <tr>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->id }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->patient->name }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->doctor }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->diagnosis }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $record->prescription }}</td>
                            <td class="px-4 py-2 border border-gray-300">
                                <div class="flex space-x-2">
                                    <a href="{{ route('medical-records.show', $record->id) }}" class="bg-blue-500 px-2 py-1 text-white rounded-md hover:bg-blue-700">View</a>
                                    <a href="{{ route('medical-records.edit', $record->id) }}" class="bg-yellow-500 px-2 py-1 text-white rounded-md hover:bg-yellow-700">Edit</a>
                                    <form action="{{ route('medical-records.destroy', $record->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 px-2 py-1 text-white rounded-md hover:bg-red-700">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-right">
                <a href="{{ route('dashboard') }}">
                    <button class="bg-red-500 px-4 py-2 text-white rounded-md hover:bg-red-700">
                        Back to Dashboard
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
