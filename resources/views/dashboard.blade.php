@extends('layouts.app')
@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        @if (Auth::guard('doctors')->check())
        <div class="grid md:grid-cols-[1fr,2fr] gap-4 mb-4">
            <div class="flex items-center justify-center md:h-full max-sm:h-64 rounded-2xl bg-white grid-cols-2">
                <div class="flex items-center justify-center h-40 rounded bg-white m-5">
                    <div class="text-center my-4">
                        <img class="mx-auto w-36 h-36 p-1 rounded-full" src="{{ asset('img/Avatar Image.svg') }}" alt="Bordered avatar" style="border: 2px solid #070A52;">
                        <div class="py-2">
                            <h1 class="text-lg font-bold" style="color: #070A52;">Hello, {{ Auth::guard('doctors')->user()->firstname }}</h1>
                            <p class="text-lg text-gray-500 font-bold">{{ Auth::guard('doctors')->user()->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center h-40 rounded bg-white m-5">
                    <h1 class="text-lg font-bold text-center" style="color: #070A52;">You are now logged in as
                        Doctor
                        <br> <br> Wishing you
                        a
                        fulfilling day of healing and growth
                    </h1>
                    </p>
                </div>
            </div>

            @php
            $totalPatient = $patients->count();
            $male = $patients->where('gender', 'male')->count();
            $female = $patients->where('gender', 'female')->count();
            $healthy = $assessments->where('status', 'Healthy')->count();
            $unhealthy = $assessments->where('status', 'Unhealthy')->count();
            $unidentified = $patients->count() - $healthy - $unhealthy;
            @endphp

            <div class="grid grid-cols-3 max-sm:grid-cols-2 gap-4">
                <div class="flex items-center justify-center h-40 rounded-2xl grid-cols-2" style="background-color: #F3E8FF;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-32 h-32 p-1 rounded-full" src="{{ asset('img/Icon.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #151D48;">{{ $totalPatient }}</h1>
                            <p class="text-base text-gray-500 font-normal">Total Patient</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl  grid-cols-2" style="background-color: #E2E5FF;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset('img/Icon1.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #070A52;">{{ $male }}</h1>
                            <p class="text-base text-gray-500 font-normal">Male</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl  grid-cols-2" style="background-color: #FEE2FF;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset('img/Icon2.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #070A52;">{{ $female }}</h1>
                            <p class="text-base text-gray-500 font-normal">Female</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl  grid-cols-2" style="background-color: #DCFCE7;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset('img/Icon3.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #070A52;">{{ $healthy }}</h1>
                            <p class="text-base text-gray-500 font-normal">Healthy</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl  grid-cols-2" style="background-color: #FFE2E5;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset('img/Icon4.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #070A52;">{{ $unhealthy }}</h1>
                            <p class="text-base text-gray-500 font-normal">Unhealthy</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl  grid-cols-2" style="background-color: #FFF4DE;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset('img/Icon5.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #070A52;">{{ $unidentified }}</h1>
                            <p class="text-base text-gray-500 font-normal">Unidentified</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (Auth::guard('admins')->check())
        <div class="grid md:grid-cols-[1fr,2fr] gap-4 mb-4">
            <div class="flex items-center justify-center md:h-full max-sm:h-64 rounded-2xl bg-white grid-cols-2">
                <div class="flex items-center justify-center h-40 rounded bg-white m-5">
                    <div class="text-center my-4">
                        <img class="mx-auto w-36 h-36 p-1 rounded-full" src="{{ asset('img/Avatar Image1.svg') }}" alt="Bordered avatar" style="border: 2px solid #070A52;">
                        <div class="py-2">
                            <h1 class="text-lg font-bold" style="color: #070A52;">Hello, {{ Auth::guard('admins')->user()->firstname }}</h1>
                            <p class="text-lg text-gray-500 font-bold">{{ Auth::guard('admins')->user()->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center h-40 rounded bg-white m-5">
                    <h1 class="text-lg font-bold text-center" style="color: #070A52;">You are now logged in as Admin
                        <br> <br> Wishing you a day filled with positive impact
                    </h1>
                    </p>
                </div>
            </div>

            @php
            $totalPatient = $patients->count();
            $male = $patients->where('gender', 'male')->count();
            $female = $patients->where('gender', 'female')->count();
            $healthy = $assessments->where('status', 'Healthy')->count();
            $unhealthy = $assessments->where('status', 'Unhealthy')->count();
            $unidentified = $patients->count() - $healthy - $unhealthy;
            @endphp

            <div class="grid grid-cols-3 max-sm:grid-cols-2 gap-4">
                <div class="flex items-center justify-center h-40 rounded-2xl grid-cols-2" style="background-color: #F3E8FF;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-32 h-32 p-1 rounded-full" src="{{ asset('img/Icon.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #151D48;">{{ $totalPatient }}</h1>
                            <p class="text-base text-gray-500 font-normal">Total Patient</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl  grid-cols-2" style="background-color: #E2E5FF;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset('img/Icon1.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #070A52;">{{ $male }}</h1>
                            <p class="text-base text-gray-500 font-normal">Male</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl  grid-cols-2" style="background-color: #FEE2FF;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset('img/Icon2.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #070A52;">{{ $female }}</h1>
                            <p class="text-base text-gray-500 font-normal">Female</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl  grid-cols-2" style="background-color: #DCFCE7;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset('img/Icon3.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #070A52;">{{ $healthy }}</h1>
                            <p class="text-base text-gray-500 font-normal">Healthy</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl  grid-cols-2" style="background-color: #FFE2E5;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset('img/Icon4.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #070A52;">{{ $unhealthy }}</h1>
                            <p class="text-base text-gray-500 font-normal">Unhealthy</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl  grid-cols-2" style="background-color: #FFF4DE;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="text-center my-4">
                            <img class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset('img/Icon5.svg') }}" alt="Bordered avatar">
                        </div>
                    </div>

                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-5xl font-bold" style="color: #070A52;">{{ $unidentified }}</h1>
                            <p class="text-base text-gray-500 font-normal">Unidentified</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (Auth::guard('web')->check())
        <div class="grid md:grid-cols-[1fr,2fr] gap-4 mb-4">
            <div class="flex items-center justify-center md:h-full max-sm:h-64 rounded-2xl bg-white grid-cols-2">
                <div class="flex items-center justify-center h-40 rounded bg-white m-5">
                    <div class="text-center my-4">
                        <img class="mx-auto w-36 h-36 p-1 rounded-full" src="{{ asset('img/Avatar Image2.svg') }}" alt="Bordered avatar" style="border: 2px solid #070A52;">
                        <div class="py-2">
                            <h1 class="text-lg font-bold" style="color: #070A52;">Hello, {{ Auth::user()->firstname }}</h1>
                            <p class="text-lg text-gray-500 font-bold">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center h-40 rounded bg-white m-5">
                    <h1 class="text-lg font-bold text-center" style="color: #070A52;">You are now logged in as
                        Patient
                        <br> <br>Your health and well-being are our top priorities
                    </h1>
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 max-sm:grid-cols-2 gap-4">
                <div class="flex items-center justify-center h-64 rounded-2xl p-5" @if ($lastAssessment) @if ($lastAssessment->status == 'Healthy')
                    style="background-color: #DCFCE7;
                    @elseif ($lastAssessment->status == 'Unhealthy')
                    style="background-color: #FFE2E5;
                    @else
                    style="background-color: #FFF4DE;
                    @endif
                    @else
                    style="background-color: #FFF4DE;
                    @endif
                    display: flex; flex-direction: column; text-align: center;">
                    <img class="mx-auto w-32 h-32 p-1 rounded-full mb-4" @if ($lastAssessment) @if ($lastAssessment->status == 'Healthy')
                    src="{{ asset('img/Icon3.svg') }}"
                    @elseif ($lastAssessment->status == 'Unhealthy')
                    src="{{ asset('img/Icon4.svg') }}"
                    @else
                    src="{{ asset('img/Icon5.svg') }}"
                    @endif
                    @else
                    src="{{ asset('img/Icon5.svg') }}"
                    @endif
                    alt="Bordered avatar">
                    <h1 class="text-2xl font-bold" style="color: #151D48;">Last Assessment</h1>
                    @if ($lastAssessment)
                    <p class="text-base text-gray-500 font-semibold">{{ $lastAssessment->status ?? 'Unidentified' }}</p>
                    <p class="text-base text-gray-500 font-semibold">{{ \Carbon\Carbon::parse($lastAssessment->datetime)->format('j F Y') }}</p>
                    @else
                    <p class="text-base text-gray-500 font-semibold">Unidentified</p>
                    <p class="text-base text-gray-500 font-semibold">Never</p>
                    @endif
                </div>


                <div class="flex items-center justify-center h-64 rounded-2xl  grid-cols-2" style="background-color: #E2E5FF;">
                    <div class="flex items-center justify-center h-40 rounded m-5">
                        <div class="py-2">
                            <h1 class="text-2xl font-bold mb-5" style="color: #151D48;">Hello Patient,
                                How are you feeling today?</h1>
                            <form action="{{ route('assessment.start') }}" method="POST">
                                @csrf
                                <button type="submit" class="rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">
                                    @php
                                    if ($takenAssessment){
                                    echo 'Continue Assessment';
                                    }
                                    else {
                                    echo 'Take New Assessment';
                                    }
                                    @endphp
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="flex flex-col mt-16 rounded-2xl p-5" style="background-color: white;">
            <h1 class="text-2xl font-bold mb-2" style="color: #070A52;">Upcoming Appointments</h1>
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
                            @elseif(Auth::guard('admins')->check())
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Doctor
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Patient
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
                            @elseif(Auth::guard('admins')->check())
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $appointment->doctors->first()->firstname }} {{ $appointment->doctors->first()->lastname }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $appointment->patients->first()->firstname }} {{ $appointment->patients->first()->lastname }}
                            </td>
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