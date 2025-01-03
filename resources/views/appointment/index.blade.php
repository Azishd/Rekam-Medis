@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="flex flex-col rounded-2xl p-5 max-md:h-screen h-[92vh] relative" style="background-color: white;">
            <h1 class="text-2xl font-bold mb-2" style="color: #070A52;">Your Appointments</h1>
            <div class="relative overflow-x-auto sm:rounded-lg w-full">
                <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-500 overflow:hidden">
                    <thead class="text-xs uppercase border-b border-gray-700" style="color: #070A52;">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-extrabold">No</th>
                            <th scope="col" class="px-6 py-3 font-extrabold">Status</th>
                            <th scope="col" class="px-6 py-3 font-extrabold">Date</th>
                            <th scope="col" class="px-6 py-3 font-extrabold">Time</th>
                            <th scope="col" class="px-6 py-3 font-extrabold">Doctor</th>
                            <th scope="col" class="px-6 py-3 font-extrabold">Action</th>
                        </tr>
                    </thead>

                    @php
                        $count = ($appointments->currentPage() - 1) * $appointments->perPage() + 1;
                    @endphp

                    <tbody>
                        @foreach($appointments as $appointment)
                            <tr class="{{ $loop->odd ? 'bg-gray-100' : '' }}">
                                <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">{{ $count++ }}</td>
                                <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">{{ ucfirst($appointment->status) }}</td>
                                <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">{{ \Carbon\Carbon::parse($appointment->datetime)->format('j F Y') }}</td>
                                <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">{{ \Carbon\Carbon::parse($appointment->datetime)->format('H:i:s') }}</td>
                                <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                    {{ $appointment->doctors->first()->firstname }} {{ $appointment->doctors->first()->lastname }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                    <!-- Add action buttons if needed -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-end mt-4">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
