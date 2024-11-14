@extends('layouts.app')
@section('content')
<div class="grid grid-cols-2 max-md:grid-cols-1 h-screen bg-white" style="background-color:  #303030;">
    <!-- Left Column -->
    <div class="max-md:hidden flex items-center justify-center bg-transparent">
        <img src="https://img.freepik.com/free-psd/entrance-emergency-room-hospital-generative-ai_587448-2182.jpg" alt="" class="object-cover h-full w-full opacity-50">
    </div>

    <!-- Right Column -->
    <div class="flex items-center justify-center bg-white">
        <div class="flex min-h-full flex-col justify-center lg:px-8">
            <div class="sm:mx-auto sm:w-full">
                <h2 class="mt-10 text-center text-5xl leading-9 tracking-tight text-black font-semibold">Create new
                    Account
                </h2>
                <h2 class="mt-2 text-md text-center leading-9 tracking-tight text-gray-400 font-normal">Kindly fill
                    the
                    fololwing information to create new account
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required placeholder="Email" class="p-5 bg-gray-100 w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800">
                            @if($errors->has('email'))
                            <div class="text-red-500 text-sm mt-1">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="password" required placeholder="Password" class="p-5 bg-gray-100 w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800">
                            @if($errors->has('password'))
                            <div class="text-red-500 text-sm mt-1">
                                {{ $errors->first('password') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="w-1/2 pr-2">
                            <input id="firstname" name="firstname" type="text" autocomplete="firstname" required placeholder="First Name" class="p-5 bg-gray-100 w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800">
                            @if($errors->has('firstname'))
                            <div class="text-red-500 text-sm mt-1">
                                {{ $errors->first('firstname') }}
                            </div>
                            @endif
                        </div>
                        <div class="w-1/2 pl-2">
                            <input id="lastname" name="lastname" type="text" autocomplete="lastname" required placeholder="Last Name" class="p-5 bg-gray-100 w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400  focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800">
                            @if($errors->has('lastname'))
                            <div class="text-red-500 text-sm mt-1">
                                {{ $errors->first('lastname') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="mt-2">
                            <input id="address" name="address" type="text" autocomplete="address" required placeholder="Address" class="p-5 bg-gray-100 w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800">
                            @if($errors->has('address'))
                            <div class="text-red-500 text-sm mt-1">
                                {{ $errors->first('address') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="w-2/3 pr-2">
                            <input id="phone" name="phone" type="text" autocomplete="phone" required placeholder="Phone Number" class="p-5 bg-gray-100 w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800">
                            @if($errors->has('phone'))
                            <div class="text-red-500 text-sm mt-1">
                                {{ $errors->first('phone') }}
                            </div>
                            @endif
                        </div>
                        <div class="w-1/3 pl-2">
                            <input id="age" name="age" type="text" autocomplete="age" required placeholder="Age" class="p-5 bg-gray-100 w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800">
                            @if($errors->has('age'))
                            <div class="text-red-500 text-sm mt-1">
                                {{ $errors->first('age') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex mt-2">
                        <div class="w-1/2 pr-2">
                            <select id="gender" name="gender" autocomplete="gender" required class="p-5 bg-gray-100 w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800">
                                <option value="null" selected>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @if($errors->has('gender'))
                            <div class="text-red-500 text-sm mt-1">
                                {{ $errors->first('gender') }}
                            </div>
                            @endif
                        </div>

                        <div class="w-1/2 pl-2">
                            <select id="role" name="role" autocomplete="role" required class="p-5 bg-gray-100 w-full rounded-md py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-800">
                                <option value="null" selected>Role</option>
                                <option value="patient">Patient</option>
                                <option value="doctor">Doctor</option>
                            </select>
                            @if($errors->has('role'))
                            <div class="text-red-500 text-sm mt-1">
                                {{ $errors->first('role') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <div class="flex items-start mb-2">
                            <div class="text-sm">
                                Already have an account ?
                                <a href="/login" class="font-semibold text-blue-800 hover:text-blue-600">Login</a>
                            </div>
                        </div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">Sign Up</button>
                    </div>
                </form>
            </div>
            <a href="{{ route('landing') }}">
                <img class="mx-auto mt-10 lg:h-24 w-auto" src="{{ asset('img/healthconnect_logo.png') }}" alt="Your Company">
            </a>
        </div>
    </div>
</div>
</div>
<script src="{{ asset('js/register.js') }}"></script>
@endsection