@extends('layouts.app')
@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="flex flex-col rounded-2xl p-5 h-[90vh] max-md:h-full relative" style="background-color: white;">
            <form action="{{ route('question.store') }}" method="POST">
                @csrf
                <h1 class="text-4xl font-bold mb-2 text-center" style="color: #070A52;">Make New Question</h1>
                <div class="m-16">
                    <h1 class="text-xl font-bold mt-10 mb-2" style="color: #070A52;">Your Question</h1>
                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Question description" required></textarea>
                </div>
                <div class="ml-16 mr-16 mb-16">
                    <h1 class="text-xl font-bold mt-10 mb-2 text-center" style="color: #070A52;">Question Type</h1>
                    <div class="grid md:grid-cols-2 max-sm:grid-cols-1">
                        <div class="flex items-center ps-4 border border-gray-200 rounded md:me-2 max-sm:mb-2">
                            <input id="bordered-radio-1" type="radio" value="boolean" name="type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Boolean</label>
                        </div>

                        <div class="flex items-center ps-4 border border-gray-200 rounded">
                            <input id="bordered-radio-2" type="radio" value="scale" name="type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Scale</label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between w-3/4 mx-auto absolute inset-x-0 bottom-0 mb-10">
                    <a href="{{ route('question') }}" class="w-1/4 rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">
                        <button type="button" class="flex justify-center w-full">
                            Cancel
                        </button>
                    </a>
                    <button type="submit" class="w-1/4 rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection