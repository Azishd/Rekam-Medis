@extends('layouts.app')
@section('content')
<div class="p-4 sm:ml-20">
    <div class="p-4">
        <div class="flex flex-col rounded-2xl p-5 h-[90vh] max-md:h-screen relative" style="background-color: white;">
            <h1 class="text-2xl font-bold mt-5 mb-10 text-center" style="color: #070A52;">Question {{ $question->id }}</h1>
            <p class="text-xl m-10 text-center">@php echo $question->description @endphp</p>

            <form action="{{ route('assessment.answer', ['id' => $question->id]) }}" method="POST">
                @csrf
                @if ($question->type == 'scale')
                <div class="flex items-center justify-center mx-auto mt-auto">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-wrap items-center">
                            <h1 class="font-bold me-8 max-md:me-2">Min</h1>
                            <div class="flex items-center flex-col me-8 max-md:me-2 relative">
                                <input id="red" name="answer" type="radio" value="1" class="before:content[''] peer relative w-16 h-16 max-md:w-10 max-md:h-10 cursor-pointer appearance-none rounded-full border border-gray-500 text-red-600 transition-all before:absolute before:top-1/2 before:left-1/2 before:transform before:-translate-y-1/2 before:-translate-x-1/2 before:block before:h-12 before:w-12 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-red-500 checked:before:bg-red-500 hover:before:opacity-20" />
                                <span class="absolute text-red-500 transition-opacity opacity-0 pointer-events-none top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 max-md:w-10 max-md:h-10">
                                        <circle cx="50%" cy="50%" r="50%" fill="currentColor" />
                                    </svg>
                                </span>
                                <label for="red" class="mt-1 text-sm font-medium text-red-600 dark:text-gray-500 absolute top-full left-1/2 transform -translate-x-1/2">
                                    1
                                </label>
                            </div>
                            <div class="flex items-center flex-col me-8 max-md:me-2 relative">
                                <input id="red" name="answer" type="radio" value="2" class="before:content[''] peer relative w-16 h-16 max-md:w-10 max-md:h-10 cursor-pointer appearance-none rounded-full border border-gray-500 text-red-600 transition-all before:absolute before:top-1/2 before:left-1/2 before:transform before:-translate-y-1/2 before:-translate-x-1/2 before:block before:h-12 before:w-12 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-red-500 checked:before:bg-red-500 hover:before:opacity-20" />
                                <span class="absolute text-red-500 transition-opacity opacity-0 pointer-events-none top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 max-md:w-10 max-md:h-10">
                                        <circle cx="50%" cy="50%" r="50%" fill="currentColor" />
                                    </svg>
                                </span>
                                <label for="red" class="mt-1 text-sm font-medium text-red-600 dark:text-gray-500 absolute top-full left-1/2 transform -translate-x-1/2">
                                    2
                                </label>
                            </div>
                            <div class="flex items-center flex-col me-8 max-md:me-2 relative">
                                <input id="red" name="answer" type="radio" value="3" class="before:content[''] peer relative w-16 h-16 max-md:w-10 max-md:h-10 cursor-pointer appearance-none rounded-full border border-gray-500 text-red-600 transition-all before:absolute before:top-1/2 before:left-1/2 before:transform before:-translate-y-1/2 before:-translate-x-1/2 before:block before:h-12 before:w-12 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-red-500 checked:before:bg-red-500 hover:before:opacity-20" />
                                <span class="absolute text-red-500 transition-opacity opacity-0 pointer-events-none top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 max-md:w-10 max-md:h-10">
                                        <circle cx="50%" cy="50%" r="50%" fill="currentColor" />
                                    </svg>
                                </span>
                                <label for="red" class="mt-1 text-sm font-medium text-red-600 dark:text-gray-500 absolute top-full left-1/2 transform -translate-x-1/2">
                                    3
                                </label>
                            </div>
                            <div class="flex items-center flex-col me-8 max-md:me-2 relative">
                                <input id="red" name="answer" type="radio" value="4" class="before:content[''] peer relative w-16 h-16 max-md:w-10 max-md:h-10 cursor-pointer appearance-none rounded-full border border-gray-500 text-red-600 transition-all before:absolute before:top-1/2 before:left-1/2 before:transform before:-translate-y-1/2 before:-translate-x-1/2 before:block before:h-12 before:w-12 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-red-500 checked:before:bg-red-500 hover:before:opacity-20" />
                                <span class="absolute text-red-500 transition-opacity opacity-0 pointer-events-none top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 max-md:w-10 max-md:h-10">
                                        <circle cx="50%" cy="50%" r="50%" fill="currentColor" />
                                    </svg>
                                </span>
                                <label for="red" class="mt-1 text-sm font-medium text-red-600 dark:text-gray-500 absolute top-full left-1/2 transform -translate-x-1/2">
                                    4
                                </label>
                            </div>
                            <div class="flex items-center flex-col me-8 max-md:me-2 relative">
                                <input id="red" name="answer" type="radio" value="5" class="before:content[''] peer relative w-16 h-16 max-md:w-10 max-md:h-10 cursor-pointer appearance-none rounded-full border border-gray-500 text-red-600 transition-all before:absolute before:top-1/2 before:left-1/2 before:transform before:-translate-y-1/2 before:-translate-x-1/2 before:block before:h-12 before:w-12 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-red-500 checked:before:bg-red-500 hover:before:opacity-20" />
                                <span class="absolute text-red-500 transition-opacity opacity-0 pointer-events-none top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 max-md:w-10 max-md:h-10">
                                        <circle cx="50%" cy="50%" r="50%" fill="currentColor" />
                                    </svg>
                                </span>
                                <label for="red" class="mt-1 text-sm font-medium text-red-600 dark:text-gray-500 absolute top-full left-1/2 transform -translate-x-1/2">
                                    5
                                </label>
                            </div>
                            <h1 class="font-bold">Max</h1>
                        </div>
                    </div>
                </div>
                @elseif ($question->type == 'boolean')
                <div class="flex items-center justify-center mx-auto mt-auto">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-wrap items-center">
                            <div class="flex items-center flex-col me-8 max-md:me-2 relative">
                                <input id="red" name="answer" type="radio" value="0" class="before:content[''] peer relative w-16 h-16 max-md:w-10 max-md:h-10 cursor-pointer appearance-none rounded-full border border-gray-500 text-red-600 transition-all before:absolute before:top-1/2 before:left-1/2 before:transform before:-translate-y-1/2 before:-translate-x-1/2 before:block before:h-12 before:w-12 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-red-500 checked:before:bg-red-500 hover:before:opacity-20" />
                                <span class="absolute text-red-500 transition-opacity opacity-0 pointer-events-none top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 max-md:w-10 max-md:h-10">
                                        <circle cx="50%" cy="50%" r="50%" fill="currentColor" />
                                    </svg>
                                </span>
                                <label for="red" class="mt-1 text-sm font-medium text-red-600 dark:text-gray-500 absolute top-full left-1/2 transform -translate-x-1/2">
                                    False
                                </label>
                            </div>
                            <div class="flex items-center flex-col relative">
                                <input id="red" name="answer" type="radio" value="1" class="before:content[''] peer relative w-16 h-16 max-md:w-10 max-md:h-10 cursor-pointer appearance-none rounded-full border border-gray-500 text-red-600 transition-all before:absolute before:top-1/2 before:left-1/2 before:transform before:-translate-y-1/2 before:-translate-x-1/2 before:block before:h-12 before:w-12 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-red-500 checked:before:bg-red-500 hover:before:opacity-20" />
                                <span class="absolute text-red-500 transition-opacity opacity-0 pointer-events-none top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 max-md:w-10 max-md:h-10">
                                        <circle cx="50%" cy="50%" r="50%" fill="currentColor" />
                                    </svg>
                                </span>
                                <label for="red" class="mt-1 text-sm font-medium text-red-600 dark:text-gray-500 absolute top-full left-1/2 transform -translate-x-1/2">
                                    True
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($errors->has('answer'))
                <div class="text-red-500 text-sm font-bold mt-10 flex justify-center">
                    {{ $errors->first('answer') }}
                </div>
                @endif
                <div class="flex justify-between w-3/4 mx-auto absolute inset-x-0 bottom-0 mb-10">
                    <button type="submit" name="submit_button" value="prev" class="w-1/4 rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">
                        Prev
                    </button>
                    <button type="submit" name="submit_button" value="next" class="w-1/4 rounded-md bg-blue-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">
                        Next
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection