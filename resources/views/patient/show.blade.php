@extends('layouts.app')
@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id2">
            <div class="relative w-[90vh] my-6 mx-auto">
                <!--content-->
                <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                    <!--header-->
                    <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                        <h3 class="text-3xl font-semibold">
                            Assessment Data
                        </h3>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        <div class="relative overflow-x-auto overflow-y-auto sm:rounded-lg w-full sm:px-3 max-h-[30vh]">
                            <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-500 overflow:hidden">
                                <thead class="text-xs uppercase border-b border-gray-700" style="color: #070A52;">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 font-extrabold">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-extrabold">
                                            Question
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-extrabold">
                                            Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-extrabold">
                                            Answer
                                        </th>
                                    </tr>
                                </thead>

                                @php
                                $count = 1;
                                @endphp

                                @foreach($questions as $question)
                                <tbody>
                                    <tr>
                                        <th scope="row" class="px-6 py-3 font-medium text-gray-700 whitespace-nowrap">
                                            {{ $count++ }}
                                        </th>
                                        <th scope="row" class="px-6 py-3 font-medium text-gray-700">
                                            {{ $question->description }}
                                        </th>
                                        <td class="px-6 py-3 font-medium text-gray-700 whitespace-nowrap">
                                            {{ $question->type }}
                                        </td>
                                        <td class="px-6 py-3 font-medium text-gray-700 whitespace-nowrap answer-cell" data-question-id="{{ $question->id }}">
                                            <span id="answer-placeholder">Loading...</span>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>

                        <h1 class="text-xl font-bold mb-2 mt-2" style="color: #070A52;">Notes</h1>
                        <textarea rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 notes-cell" readonly><span id="notes-placeholder"></span></textarea>
                    </div>

                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                        <button class="rounded-md bg-transparent px-3 py-1.5 text-sm font-semibold leading-6 text-red-500 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 mr-5" type="button" onclick="toggleModal('modal-id2')">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id2-backdrop"></div>

        <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
            <div class="relative w-[90vh] mx-auto">
                <!--content-->
                <form action="{{ route('patient.update', ['id' => $patient->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        <!--header-->
                        <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                            <h3 class="text-3xl font-semibold">
                                Patient Data
                            </h3>
                        </div>
                        <!--body-->
                        <div class="relative p-6 flex-auto">
                            <div class="relative overflow-x-auto overflow-y-auto sm:rounded-lg w-full sm:px-3">
                                <div class="py-3 grid md:grid-cols-[1fr,2fr] sm:gap-4 sm:px-3">
                                    <div class="text-sm font-bold text-black flex my-auto">
                                        First Name
                                    </div>
                                    <div class="text-sm text-gray-900 sm:mt-0">
                                        <input type="text" id="firstname" name="firstname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $patient->firstname }}" />
                                        <label for="firstname" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">First Name</label>
                                        @if($errors->has('firstname'))
                                        <div class="text-red-500 text-sm mt-1">
                                            {{ $errors->first('firstname') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="py-3 grid md:grid-cols-[1fr,2fr] sm:gap-4 sm:px-3">
                                    <div class="text-sm font-bold text-black flex my-auto">
                                        Last Name
                                    </div>
                                    <div class="text-sm text-gray-900 sm:mt-0">
                                        <input type="text" id="lastname" name="lastname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $patient->lastname }}" />
                                        <label for="lastname" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">First Name</label>
                                        @if($errors->has('lastname'))
                                        <div class="text-red-500 text-sm mt-1">
                                            {{ $errors->first('lastname') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="py-3 grid md:grid-cols-[1fr,2fr] sm:gap-4 sm:px-3">
                                    <div class="text-sm font-bold text-black flex my-auto">
                                        Age
                                    </div>
                                    <div class="text-sm text-gray-900 sm:mt-0">
                                        <input type="text" id="age" name="age" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $patient->age }}" />
                                        <label for="age" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">Age</label>
                                        @if($errors->has('age'))
                                        <div class="text-red-500 text-sm mt-1">
                                            {{ $errors->first('age') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="py-3 grid md:grid-cols-[1fr,2fr] sm:gap-4 sm:px-3">
                                    <div class="text-sm font-bold text-black flex my-auto">
                                        Gender
                                    </div>
                                    <div class="text-sm text-gray-900 sm:mt-0">
                                        <select id="gender" name="gender" autocomplete="gender" required class="border-solid border-blue-800 border-[1px] px-3 py-1 rounded-lg cursor-pointer flex justify-between items-center bg-white">
                                            <option value="male" @if(ucfirst($patient->gender) == 'male') selected @endif>Male</option>
                                            <option value="female" @if(ucfirst($patient->gender) == 'female') selected @endif>Female</option>
                                            <option value="other" @if(ucfirst($patient->gender) == 'other') selected @endif>Other</option>
                                        </select>
                                        @if($errors->has('gender'))
                                        <div class="text-red-500 text-sm mt-1">
                                            {{ $errors->first('gender') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="py-3 grid md:grid-cols-[1fr,2fr] sm:gap-4 sm:px-3">
                                    <div class="text-sm font-bold text-black flex my-auto">
                                        Address
                                    </div>
                                    <div class="text-sm text-gray-900 sm:mt-0">
                                        <input type="text" id="address" name="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $patient->address }}" />
                                        <label for="address" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style="width: 150px; white-space: nowrap; padding-right: 10px;">Address</label>
                                        @if($errors->has('address'))
                                        <div class="text-red-500 text-sm mt-1">
                                            {{ $errors->first('address') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="py-3 grid md:grid-cols-[1fr,2fr] sm:gap-4 sm:px-3">
                                    <div class="text-sm font-bold text-black flex my-auto">
                                        Phone Number
                                    </div>
                                    <div class="text-sm text-gray-900 sm:mt-0">
                                        <input type="text" id="phone" name="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $patient->phone }}" />
                                        <label for="phone" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style="width: 150px; white-space: nowrap; padding-right: 10px;">Phone Number</label>
                                        @if($errors->has('phone'))
                                        <div class="text-red-500 text-sm mt-1">
                                            {{ $errors->first('phone') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--footer-->
                        <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                            <button class="rounded-md bg-transparent px-3 py-1.5 text-sm font-semibold leading-6 text-red-500 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 mr-5" type="button" onclick="toggleModal('modal-id')">
                                Close
                            </button>
                            <button type="submit" class="rounded-md bg-emerald-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-emerald-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" onclick="toggleModal('modal-id')">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

        <div class="flex flex-col rounded-2xl p-5 h-[92vh] max-md:h-full relative" style="background-color: white;">
            <div class="flex items-center justify-between">
                <a href="{{ route('patient') }}" class="text-3xl font-bold mb-2 ms-2" style="color: #070A52; text-decoration: none;">
                    <div class="flex my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 font-bold items-center ms-2" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                        </svg>
                        Patient Detail
                    </div>
                </a>
                @if (Auth::guard('admins')->check())
                <button class="mx-5  rounded-md bg-blue-800 px-5 py-2 text-md font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800" type="button" onclick="toggleModal('modal-id', <?php echo $patient->id; ?>)">
                    Edit
                </button>
                @endif
            </div>

            <div class="py-3 grid md:grid-cols-[0.3fr,2fr] sm:gap-4 sm:px-3">
                <div class="text-sm font-bold text-black">
                    Nama
                </div>
                <div class="text-sm text-gray-900 sm:mt-0">
                    {{ $patient->firstname }} {{ $patient->lastname }}
                </div>
            </div>
            <div class="py-3 grid md:grid-cols-[0.3fr,2fr] sm:gap-4 sm:px-3">
                <div class="text-sm font-bold text-black">
                    Age
                </div>
                <div class="text-sm text-gray-900 sm:mt-0">
                    {{ $patient->age }}
                </div>
            </div>
            <div class="py-3 grid md:grid-cols-[0.3fr,2fr] sm:gap-4 sm:px-3">
                <div class="text-sm font-bold text-black">
                    Gender
                </div>
                <div class="text-sm text-gray-900 sm:mt-0">
                    {{ ucfirst($patient->gender) }}
                </div>
            </div>
            <div class="py-3 grid md:grid-cols-[0.3fr,2fr] sm:gap-4 sm:px-3">
                <div class="text-sm font-bold text-black">
                    Address
                </div>
                <div class="text-sm text-gray-900 sm:mt-0">
                    {{ $patient->address }}
                </div>
            </div>
            <div class="py-3 grid md:grid-cols-[0.3fr,2fr] sm:gap-4 sm:px-3">
                <div class="text-sm font-bold text-black">
                    Phone Number
                </div>
                <div class="text-sm text-gray-900 sm:mt-0">
                    {{ $patient->phone }}
                </div>
            </div>

            <div class="flex items-center justify-between mb-2 sm:px-3">
                <h1 class="text-2xl font-bold" style="color: #070A52;">Assesment History</h1>
            </div>

            <div class="relative overflow-x-auto sm:rounded-lg w-full sm:px-3">
                <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-500 overflow:hidden">
                    <thead class="text-xs uppercase border-b border-gray-700" style="color: #070A52;">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Verified
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Doctor
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Action
                            </th>
                        </tr>
                    </thead>

                    @php
                    $count = ($assessments->currentPage() - 1) * $assessments->perPage() + 1;
                    @endphp
                    @foreach($assessments as $assessment)

                    @php
                    $isOdd = $loop->odd;
                    @endphp

                    <tbody>
                        <tr class="{{ $isOdd ? 'bg-gray-100' : '' }}">
                            <th scope="row" class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                {{ $count++ }}
                            </th>
                            <th class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($assessment->datetime)->format('j F Y') }}
                            </th>
                            <td class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($assessment->datetime)->format('H:i:s') }}
                            </td>
                            <td class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                {{ $assessment->status ?? 'Unidentified' }}
                            </td>
                            <td class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                {{ $assessment->is_verified ? 'Verified' : 'Not Verified' }}
                            </td>
                            <th scope="row" class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                {{ $assessment->doctors->first()->firstname }} {{ $assessment->doctors->first()->lastname }}
                            </th>
                            <td class="px-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <button class="rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" type="button" onclick="toggleModal('modal-id2', <?php echo $assessment->id; ?>)">
                                        Details
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="absolute bottom-0 right-0 mb-4 mr-4">
                <div class="inline-flex rounded-md">
                    {{ $assessments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/modal.js') }}"></script>
@endsection