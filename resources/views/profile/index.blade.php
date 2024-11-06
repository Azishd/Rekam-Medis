@extends('layouts.app')
@section('content')
@if(Auth::guard('web')->check())
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="custom-height grid md:grid-cols-[1fr,0.5fr,2fr] gap-4 mb-4 bg-white rounded-2xl">
            <!-- Column 1 -->
            <div class="flex items-center justify-center grid-cols-2">
                <div class="flex items-center justify-center rounded bg-white m-5">
                    <div class="text-center my-4">
                        <img class="w-64 h-64 p-1 rounded-full" src="{{ asset('img/Avatar Image2.svg') }}" alt="Bordered avatar" style="border: 2px solid #070A52;">
                        <div class="py-2">
                            <h1 class="text-lg font-bold" style="color: #070A52;">Hello, {{ Auth::guard('web')->user()->firstname }}</h1>
                            <p class="text-lg text-gray-500 font-bold">{{ Auth::guard('web')->user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="w-1 bg-gray-300 m-16 hidden sm:block">
            </div>

            <!-- Column 3 -->
            <div class="flex items-center justify-center m-10">
                <div class="text-start w-full">
                    <h1 class="text-2xl font-bold mb-5 text-center" style="color: #070A52;">Personal Info</h1>
                    <div class="w-1 bg-gray-300">
                    </div>
                    <div class="flex mb-4">
                        <div class="w-1/2 pr-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->firstname }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">First Name</label>
                            </div>
                        </div>
                        <div class="w-1/2 pl-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->lastname }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="w-full mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->address }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style=" width: 150px; white-space: nowrap; padding-right: 10px;">Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="w-1/3 pr-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->phone }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style=" width: 150px; white-space: nowrap; padding-right: 10px;">Phone Number</label>
                            </div>
                        </div>
                        <div class="w-1/3 pr-2 pl-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ ucfirst(Auth::guard('web')->user()->gender) }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style=" width: 150px; white-space: nowrap; padding-right: 10px;">Gender</label>
                            </div>
                        </div>
                        <div class="w-1/3 pr-2 pl-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('web')->user()->age }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style=" width: 150px; white-space: nowrap; padding-right: 10px;">Age</label>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="flex w-full justify-center rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif (Auth::guard('doctors')->check())
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="custom-height grid md:grid-cols-[1fr,0.5fr,2fr] gap-4 mb-4 bg-white rounded-2xl">
            <!-- Column 1 -->
            <div class="flex items-center justify-center grid-cols-2">
                <div class="flex items-center justify-center rounded bg-white m-5">
                    <div class="text-center my-4">
                        <img class="w-64 h-64 p-1 rounded-full" src="{{ asset('img/Avatar Image.svg') }}" alt="Bordered avatar" style="border: 2px solid #070A52;">
                        <div class="py-2">
                            <h1 class="text-lg font-bold" style="color: #070A52;">Hello, {{ Auth::guard('doctors')->user()->firstname }}</h1>
                            <p class="text-lg text-gray-500 font-bold">{{ Auth::guard('doctors')->user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="w-1 bg-gray-300 m-16 hidden sm:block">
            </div>

            <!-- Column 3 -->
            <div class="flex items-center justify-center m-10">
                <div class="text-start w-full">
                    <h1 class="text-2xl font-bold mb-5 text-center" style="color: #070A52;">Personal Info</h1>
                    <div class="w-1 bg-gray-300">
                    </div>
                    <div class="flex mb-4">
                        <div class="w-1/2 pr-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->firstname }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">First Name</label>
                            </div>
                        </div>
                        <div class="w-1/2 pl-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->lastname }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="w-full mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->address }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto  text-blue-800" style=" width: 150px; white-space: nowrap; padding-right: 10px;">Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="w-1/3 pr-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->phone }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style=" width: 150px; white-space: nowrap; padding-right: 10px;">Phone Number</label>
                            </div>
                        </div>
                        <div class="w-1/3 pr-2 pl-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ ucfirst(Auth::guard('doctors')->user()->gender) }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style=" width: 150px; white-space: nowrap; padding-right: 10px;">Gender</label>
                            </div>
                        </div>
                        <div class="w-1/3 pr-2 pl-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('doctors')->user()->age }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800" style=" width: 150px; white-space: nowrap; padding-right: 10px;">Age</label>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="flex w-full justify-center rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif (Auth::guard('admins')->check())
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="custom-height grid md:grid-cols-[1fr,0.5fr,2fr] gap-4 mb-4 bg-white rounded-2xl">
            <!-- Column 1 -->
            <div class="flex items-center justify-center grid-cols-2">
                <div class="flex items-center justify-center rounded bg-white m-5">
                    <div class="text-center my-4">
                        <img class="w-64 h-64 p-1 rounded-full" src="{{ asset('img/Avatar Image1.svg') }}" alt="Bordered avatar" style="border: 2px solid #070A52;">
                        <div class="py-2">
                            <h1 class="text-lg font-bold" style="color: #070A52;">Hello, admin</h1>
                            <p class="text-lg text-gray-500 font-bold">{{ Auth::guard('admins')->user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="w-1 bg-gray-300 m-16 hidden sm:block">
            </div>

            <!-- Column 3 -->
            <div class="flex items-center justify-center m-10">
                <div class="text-start w-full">
                    <h1 class="text-2xl font-bold mb-5 text-center" style="color: #070A52;">Personal Info</h1>
                    <div class="w-1 bg-gray-300">
                    </div>
                    <div class="flex mb-4">
                        <div class="w-full pr-2 mb-6">
                            <div class="relative z-0 border-b border-gray-700">
                                <input type="text" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none font-normal focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ Auth::guard('admins')->user()->email }}" readonly />
                                <label for="first_name" class="absolute font-semibold duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto text-blue-800">Email</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection