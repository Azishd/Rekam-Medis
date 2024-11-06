@extends('layouts.app')
@section('content')
@if (Auth::guard('web')->check())
<form action="{{ route('profile.update')}}" method="POST">
    @csrf
    @method('put')
    <div class="p-4 sm:ml-20">
        <div class="p-4">
            <div class="custom-height grid md:grid-cols-[1fr,2fr] gap-4 mb-4 bg-white rounded-2xl">
                <!-- Column 1 -->
                <div class="flex items-center justify-center grid-cols-2">
                    <div class="flex items-center justify-center h-40 rounded bg-white m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-36 h-36 p-1 rounded-full" src="{{ asset('img/Avatar Image2.svg') }}" alt="Bordered avatar" style="border: 2px solid #070A52;">
                            <div class="py-2">
                                <h1 class="text-lg font-bold" style="color: #070A52;">Hello, {{ Auth::guard('web')->user()->firstname }}</h1>
                                <p class="text-lg text-gray-500 font-bold">{{ Auth::guard('web')->user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded bg-white m-5 w-1/3">
                        <h1 class="text-lg font-bold text-center" style="color: #070A52;">You are now logged in as Patient
                        </h1>
                    </div>
                </div>


                <input type="hidden" id="id" name="id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->id }}" />

                <input type="hidden" id="role" name="role" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="patient" />

                <!-- Column 3 -->
                <div class="flex items-center justify-center m-10">
                    <div class="text-start w-full">
                        <div class="flex items-center justify-between mb-5">
                            <h1 class="text-2xl font-bold" style="color: #070A52;">Edit User</h1>
                            <div class="flex space-x-2">
                                <a href="{{ route('profile') }}" class="text-sm bg-transparent hover:bg-blue-800 text-blue-800 font-semibold hover:text-white py-1 px-2 border border-blue-800  hover:border-transparent rounded">
                                    Cancel
                                </a>
                                <button class="rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">
                                    Edit Profile
                                </button>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <div class="w-1/2 pr-2 mb-6">
                                <div class="relative z-0 border-b border-gray-700">
                                    <input type="text" id="firstname" name="firstname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->firstname }}" />
                                    <label for="firstname" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">First Name</label>
                                    @if($errors->has('firstname'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('firstname') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="w-1/2 pl-2 mb-6">
                                <div class="relative z-0 border-b border-gray-700">
                                    <input type="text" id="lastname" name="lastname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->lastname }}" />
                                    <label for="lastname" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">Last Name</label>
                                    @if($errors->has('lastname'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('lastname') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <div class="w-full mb-6">
                                <div class="relative z-0 border-b border-gray-700">
                                    <input type="text" id="address" name="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->address }}" />
                                    <label for="address" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style="width: 150px; white-space: nowrap; padding-right: 10px;">Address</label>
                                    @if($errors->has('address'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('address') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <div class="w-1/3 pr-2 mb-6">
                                <div class="relative z-0 border-b border-gray-700">
                                    <input type="text" id="phone" name="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->phone }}" />
                                    <label for="phone" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style="width: 150px; white-space: nowrap; padding-right: 10px;">Phone Number</label>
                                    @if($errors->has('phone'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('phone') }}
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="w-1/3 pl-2 pr-2 mb-6 -mt-2">
                                <div class="relative w-32" id="dropdownButton">
                                    <div class="text-xs font-medium text-black mb-1 text-blue-800">Gender
                                    </div>
                                    <select id="gender" name="gender" autocomplete="gender" required class="border-solid border-blue-800 border-[1px] px-3 py-1 rounded-lg cursor-pointer flex justify-between items-center bg-white">
                                        <option value="male" @if(Auth::guard('web')->user()->gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if(Auth::guard('web')->user()->gender == 'female') selected @endif>Female</option>
                                        <option value="other" @if(Auth::guard('web')->user()->gender == 'other') selected @endif>Other</option>
                                    </select>
                                    @if($errors->has('gender'))
                                    <div class="text-red-500 text-sm">
                                        {{ $errors->first('gender') }}
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="w-1/3 pl-2 mb-6">
                                <div class="relative z-0 border-b border-gray-700">
                                    <input type="text" id="age" name="age" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->age }}" />
                                    <label for="age" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">Age</label>
                                    @if($errors->has('age'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('age') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@elseif (Auth::guard('doctors')->check())
<form action="{{ route('profile.update')}}" method="POST">
    @csrf
    @method('put')
    <div class="p-4 sm:ml-20">
        <div class="p-4">
            <div class="custom-height grid md:grid-cols-[1fr,2fr] gap-4 mb-4 bg-white rounded-2xl">
                <!-- Column 1 -->
                <div class="flex items-center justify-center grid-cols-2">
                    <div class="flex items-center justify-center h-40 rounded bg-white m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-36 h-36 p-1 rounded-full" src="{{ asset('img/Avatar Image.svg') }}" alt="Bordered avatar" style="border: 2px solid #070A52;">
                            <div class="py-2">
                                <h1 class="text-lg font-bold" style="color: #070A52;">Hello, {{ Auth::guard('doctors')->user()->firstname }}</h1>
                                <p class="text-lg text-gray-500 font-bold">{{ Auth::guard('doctors')->user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded bg-white m-5 w-1/3">
                        <h1 class="text-lg font-bold text-center" style="color: #070A52;">You are now logged in as Doctor
                        </h1>
                    </div>
                </div>


                <input type="hidden" id="id" name="id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->id }}" />

                <input type="hidden" id="role" name="role" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="doctor" />

                <!-- Column 3 -->
                <div class="flex items-center justify-center m-10">
                    <div class="text-start w-full">
                        <div class="flex items-center justify-between mb-5">
                            <h1 class="text-2xl font-bold" style="color: #070A52;">Edit User</h1>
                            <div class="flex space-x-2">
                                <a href="{{ route('profile') }}" class="text-sm bg-transparent hover:bg-blue-800 text-blue-800 font-semibold hover:text-white py-1 px-2 border border-blue-800  hover:border-transparent rounded">
                                    Cancel
                                </a>
                                <button class="rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">
                                    Edit Profile
                                </button>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <div class="w-1/2 pr-2 mb-6">
                                <div class="relative z-0 border-b border-gray-700">
                                    <input type="text" id="firstname" name="firstname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->firstname }}" />
                                    <label for="firstname" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">First Name</label>
                                    @if($errors->has('firstname'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('firstname') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="w-1/2 pl-2 mb-6">
                                <div class="relative z-0 border-b border-gray-700">
                                    <input type="text" id="lastname" name="lastname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->lastname }}" />
                                    <label for="lastname" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">Last Name</label>
                                    @if($errors->has('lastname'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('lastname') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <div class="w-full mb-6">
                                <div class="relative z-0 border-b border-gray-700">
                                    <input type="text" id="address" name="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->address }}" />
                                    <label for="address" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style="width: 150px; white-space: nowrap; padding-right: 10px;">Address</label>
                                    @if($errors->has('address'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('address') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex mb-4">
                            <div class="w-1/3 pr-2 mb-6">
                                <div class="relative z-0 border-b border-gray-700">
                                    <input type="text" id="phone" name="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->phone }}" />
                                    <label for="phone" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style="width: 150px; white-space: nowrap; padding-right: 10px;">Phone Number</label>
                                    @if($errors->has('phone'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('phone') }}
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="w-1/3 pl-2 pr-2 mb-6 -mt-2">
                                <div class="relative w-32" id="dropdownButton">
                                    <div class="text-xs font-medium text-black mb-1 text-blue-800">Gender
                                    </div>
                                    <select id="gender" name="gender" autocomplete="gender" required class="border-solid border-blue-800 border-[1px] px-3 py-1 rounded-lg cursor-pointer flex justify-between items-center bg-white">
                                        <option value="male" @if(Auth::guard('doctors')->user()->gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if(Auth::guard('doctors')->user()->gender == 'female') selected @endif>Female</option>
                                        <option value="other" @if(Auth::guard('doctors')->user()->gender == 'other') selected @endif>Other</option>
                                    </select>
                                    @if($errors->has('gender'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('gender') }}
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="w-1/3 pl-2 mb-6">
                                <div class="relative z-0 border-b border-gray-700">
                                    <input type="text" id="age" name="age" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->age }}" />
                                    <label for="age" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">Age</label>
                                    @if($errors->has('age'))
                                    <div class="text-red-500 text-sm mt-1">
                                        {{ $errors->first('age') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endif
@endsection