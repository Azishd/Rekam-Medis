@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="flex flex-col rounded-2xl p-5 max-md:h-screen h-[92vh] relative" style="background-color: white;">
            <h1 class="text-2xl font-bold mb-2" style="color: #070A52;">Find Patient by NIK</h1>

            @if(session('error'))
                <div class="text-red-500 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('fetch.patient') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nik" class="block text-gray-700">Enter NIK</label>
                    <input type="text" name="nik" id="nik" class="px-4 py-2 border rounded-lg w-full mt-2" required />
                </div>
                
                <button type="submit" class="bg-indigo-500 px-4 py-2 text-white rounded-md hover:bg-indigo-700">
                    Search Patient
                </button>
            </form>

            <div class="mt-4 text-right">
                <a href="{{ route('patient') }}">
                    <button class="bg-red-500 px-4 py-2 text-white rounded-md hover:bg-red-700">
                        Back to Patients
                    </button>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
