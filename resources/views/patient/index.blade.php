@extends('layouts.app')
@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="flex flex-col rounded-2xl p-5 max-md:h-screen h-[92vh] relative" style="background-color: white;">
            <h1 class="text-2xl font-bold mb-2" style="color: #070A52;">Your Patients</h1>
            <div class="relative overflow-x-auto sm:rounded-lg w-full">
                <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-500 overflow:hidden">
                    <thead class="text-xs uppercase border-b border-gray-700" style="color: #070A52;">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Fullname
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Address
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Gender
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Age
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Detail
                            </th>
                        </tr>
                    </thead>
                    @php
                    $count = ($patients->currentPage() - 1) * $patients->perPage() + 1;
                    @endphp

                    <tbody>
                        @foreach($patients as $patient)

                        @php
                        $isOdd = $loop->odd;
                        @endphp

                        <tr class="{{ $isOdd ? 'bg-gray-100' : '' }}">
                            <th scope="row" class="px-4 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $count++ }}
                            </th>
                            <th scope="row" class="px-4 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $patient->firstname }} {{ $patient->lastname }}
                            </th>
                            <td class="px-4 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $patient->email }}
                            </td>
                            <td class="px-4 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $patient->address }}
                            </td>
                            <td class="px-4 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $patient->phone }}
                            </td>
                            <td class="px-4 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ ucfirst($patient->gender) }}
                            </td>
                            <td class="px-4 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $patient->age }}
                            </td>
                            <td class="px-4 py-4 font-medium text-gray-700 whitespace-nowrap">
                                <a href="{{ route('patient.show', ['id' => $patient->id]) }}">
                                    <button class="rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                        Detail
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col-reverse justify-end items-end bottom-0 right-0 mt-4 mb-4 mr-4">
                <div class="inline-flex rounded-md">
                    {{ $patients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection