@extends('layouts.app')
@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="flex flex-col rounded-2xl p-5 max-md:h-screen h-[92vh] relative" style="background-color: white;">
            <div class="flex items-center justify-between mb-5">
                <h1 class="text-2xl font-bold mb-2" style="color: #070A52;">Assessment Questions</h1>
                <div class="flex space-x-2">
                    @if (Auth::guard('admins')->check())
                    <a href="{{ route('question.create') }}">
                        <button class="flex w-full justify-center rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">
                            Add New Question
                        </button>
                        @endif
                    </a>
                </div>
            </div>
            <div class="relative overflow-x-auto sm:rounded-lg w-full">
                <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-500 overflow:hidden">
                    <thead class="text-xs uppercase border-b border-gray-700" style="color: #070A52;">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Description
                            </th>
                            @if (Auth::guard('admins')->check())
                            <th scope="col" class="px-6 py-3 font-extrabold">
                                Action
                            </th>
                            @endif
                        </tr>
                    </thead>

                    @php
                    $count = ($questions->currentPage() - 1) * $questions->perPage() + 1;
                    @endphp
                    <tbody>
                        @foreach($questions as $question)

                        @php
                        $isOdd = $loop->odd;
                        @endphp

                        <tr class="{{ $isOdd ? 'bg-gray-100' : '' }}">
                            <th scope="row" class="px-6 py-3 font-medium text-gray-700 whitespace-nowrap">
                                {{ $count++ }}
                            </th>
                            <th scope="row" class="px-6 py-3 font-medium text-gray-700">
                                {{ $question->description }}
                            </th>
                            @if (Auth::guard('admins')->check())
                            <form action="{{ route('question.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" id="id" name="id" value="{{ $question->id }}" />
                                <th class="px-6 py-3 font-medium text-gray-700 whitespace-nowrap">
                                    <button type="submit" class="rounded-md bg-rose-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-500">
                                        Delete
                                    </button>
                                </th>
                            </form>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col-reverse justify-end items-end bottom-0 right-0 mt-4 mb-4 mr-4">
                <div class="inline-flex rounded-md">
                    <!-- <button onclick="next()" class="px-4 py-2 text-sm font-medium text-stone-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-stone-900 focus:text-stone-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button onclick="prev()" class="px-4 py-2 text-sm font-medium text-stone-900 bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-stone-900 focus:text-stone-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button> -->
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection