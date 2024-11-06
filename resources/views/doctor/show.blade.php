@extends('layouts.app')
@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
            <div class="relative w-[90vh] mx-auto">
                <!--content-->
                <form action="{{ route('doctor.update', ['id' => $doctor->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                        <!--header-->
                        <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                            <h3 class="text-3xl font-semibold">
                                Doctor Data
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
                                        <input type="text" id="firstname" name="firstname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $doctor->firstname }}" />
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
                                        <input type="text" id="lastname" name="lastname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $doctor->lastname }}" />
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
                                        <input type="text" id="age" name="age" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $doctor->age }}" />
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
                                            <option value="male" @if(ucfirst($doctor->gender) == 'male') selected @endif>Male</option>
                                            <option value="female" @if(ucfirst($doctor->gender) == 'female') selected @endif>Female</option>
                                            <option value="other" @if(ucfirst($doctor->gender) == 'other') selected @endif>Other</option>
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
                                        <input type="text" id="address" name="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $doctor->address }}" />
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
                                        <input type="text" id="phone" name="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $doctor->phone }}" />
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
                <a href="{{ route('doctor') }}" class="text-3xl font-bold mb-2 ms-2 block" style="color: #070A52; text-decoration: none;">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 font-bold items-center ms-2" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                        </svg>
                        Doctor Detail
                    </div>
                </a>
                @if (Auth::guard('admins')->check())
                <button class="mx-5  rounded-md bg-blue-800 px-5 py-2 text-md font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800" type="button" onclick="toggleModal('modal-id', <?php echo $doctor->id; ?>)">
                    Edit
                </button>
                @endif
            </div>

            <div class="py-3 grid md:grid-cols-[0.3fr,2fr] sm:gap-4 sm:px-3">
                <div class="text-sm font-bold text-black">
                    Nama
                </div>
                <div class="text-sm text-gray-900 sm:mt-0">
                    {{ $doctor->firstname }} {{ $doctor->lastname }}
                </div>
            </div>
            <div class="py-3 grid md:grid-cols-[0.3fr,2fr] sm:gap-4 sm:px-3">
                <div class="text-sm font-bold text-black">
                    Age
                </div>
                <div class="text-sm text-gray-900 sm:mt-0">
                    {{ $doctor->age }}
                </div>
            </div>
            <div class="py-3 grid md:grid-cols-[0.3fr,2fr] sm:gap-4 sm:px-3">
                <div class="text-sm font-bold text-black">
                    Gender
                </div>
                <div class="text-sm text-gray-900 sm:mt-0">
                    {{ ucfirst($doctor->gender) }}
                </div>
            </div>
            <div class="py-3 grid md:grid-cols-[0.3fr,2fr] sm:gap-4 sm:px-3">
                <div class="text-sm font-bold text-black">
                    Address
                </div>
                <div class="text-sm text-gray-900 sm:mt-0">
                    {{ $doctor->address }}
                </div>
            </div>
            <div class="py-3 grid md:grid-cols-[0.3fr,2fr] sm:gap-4 sm:px-3">
                <div class="text-sm font-bold text-black">
                    Phone Number
                </div>
                <div class="text-sm text-gray-900 sm:mt-0">
                    {{ $doctor->phone }}
                </div>
            </div>

            <div class="flex items-center justify-between mb-2 sm:px-3">
                <h1 class="text-2xl font-bold" style="color: #070A52;">Patients</h1>
            </div>


            <div class="relative overflow-x-auto sm:rounded-lg w-full sm:px-3">
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
                        </tr>
                    </thead>

                    @php
                    $count = ($patients->currentPage() - 1) * $patients->perPage() + 1;
                    @endphp
                    @foreach($patients as $patient)

                    @php
                    $isOdd = $loop->odd;
                    @endphp

                    <tbody>
                        <tr class="{{ $isOdd ? 'bg-gray-100' : '' }}">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $count++ }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $patient->firstname }} {{ $patient->lastname }}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $patient->email }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $patient->address }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $patient->phone }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ ucfirst($patient->gender) }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $patient->age }}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>

            <div class="absolute bottom-0 right-0 mb-4 mr-4">
                <div class="inline-flex rounded-md">
                    {{ $patients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/modal.js') }}"></script>
@endsection