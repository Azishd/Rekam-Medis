@extends('layouts.app')
@section('content')
<div class="grid lg:grid-cols-2 md:grid-cols-1 h-screen bg-white" style="background-color: #303030;">
    <!-- Left Column -->
    <div class="max-md:hidden flex items-center justify-center bg-transparent">
        <img src="https://img.freepik.com/free-psd/abstract-blur-luxury-hospital-corridor-generative-ai_587448-2121.jpg" class="object-cover h-full w-full opacity-50" alt="">
    </div>

    <!-- Right Column -->
    <div class="flex items-center justify-center bg-white">
        <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full">
                <h2 class="mt-10 text-center text-5xl leading-9 tracking-tight text-black">Welcome to
                    <span class="text-600 font-bold " style="color:#32F1A1">Health Connect</span>
                </h2>
                <h2 class="mt-2 text-md max-md:text-center leading-9 tracking-tight text-gray-500">Please login to your account
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
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
                        <div class="flex items-end mt-2">
                            <div class="text-sm ml-auto">
                                Don't have an account ?
                                <a href="/register" class="font-semibold text-green-800 hover:text-green-600">register
                                    here</a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-green-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">Sign
                            in</button>
                    </div>
                </form>
                <a href="{{ route('landing') }}">
                    <img class="mx-auto mt-10 lg:h-24 w-auto" src="{{ asset('img/healthconnect_logo.png') }}" alt="Your Company">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection