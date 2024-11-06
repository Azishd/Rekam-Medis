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
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Time
                            </th>
                            @if(Auth::guard('web')->check())
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Doctor
                            </th>
                            @elseif(Auth::guard('doctors')->check())
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Patient
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Action
                            </th>
                            @elseif(Auth::guard('admins')->check())
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Doctor
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Patient
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Action
                            </th>
                            @endif
                        </tr>
                    </thead>

                    @php
                    $count = ($appointments->currentPage() - 1) * $appointments->perPage() + 1;
                    @endphp
                    @foreach($appointments as $appointment)

                    @php
                    $isOdd = $loop->odd;
                    @endphp
                    <tbody>
                        <tr class="{{ $isOdd ? 'bg-gray-100' : '' }}">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $count++ }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ ucfirst($appointment->status) }}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($appointment->datetime)->format('j F Y') }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($appointment->datetime)->format('H:i:s') }}
                            </td>
                            @if(Auth::guard('web')->check())
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $appointment->doctors->first()->firstname }} {{ $appointment->doctors->first()->lastname }}
                            </td>
                            @elseif(Auth::guard('doctors')->check())
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $appointment->patients->first()->firstname }} {{ $appointment->patients->first()->lastname }}
                            </td>
                            @if($appointment->status == 'waiting')
                            <td class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <form action="{{ route('appointment.verify') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="id" name="id" value="{{ $appointment->id }}" />
                                        <button type="submit" name="submit_button" value="accept" class="rounded-md bg-emerald-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-emerald-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                            Accept
                                        </button>
                                        <button type="submit" name="submit_button" value="reject" class="rounded-md bg-rose-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-500">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @else
                            <td class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                <div class="flex space-x-2">
                                </div>
                            </td>
                            @endif
                            @elseif(Auth::guard('admins')->check())
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $appointment->doctors->first()->firstname }} {{ $appointment->doctors->first()->lastname }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $appointment->patients->first()->firstname }} {{ $appointment->patients->first()->lastname }}
                            </td>
                            @if($appointment->status == 'waiting')
                            <td class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <form action="{{ route('appointment.verify') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="id" name="id" value="{{ $appointment->id }}" />
                                        <button type="submit" name="submit_button" value="accept" class="rounded-md bg-emerald-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-emerald-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                            Accept
                                        </button>
                                        <button type="submit" name="submit_button" value="reject" class="rounded-md bg-rose-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-500">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @else
                            <td class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                <div class="flex space-x-2">
                                </div>
                            </td>
                            @endif
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col-reverse justify-end items-end bottom-0 right-0 mt-4 mb-4 mr-4">
                <div class="inline-flex rounded-md">
                    {{ $appointments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection