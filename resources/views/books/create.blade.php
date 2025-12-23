<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">

    <h1 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">➕ Add Book</h1>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <!-- TITLE -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Title</label>
            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                class="w-full px-3 py-2 border rounded text-black
                       @error('title') border-red-500 @enderror"
            >
            @error('title')
    <p class="text-red-600 text-sm mt-1">
        {{ $message }}
    </p>
@enderror

        </div>

        <!-- AUTHOR -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Author</label>
            <input
                type="text"
                name="author"
                value="{{ old('author') }}"
                class="w-full px-3 py-2 border rounded text-black
                       @error('author') border-red-500 @enderror"
    
            >
           @error('author')
    <p class="text-red-600 text-sm mt-1">
        {{ $message }}
    </p>
@enderror


        </div>

        <!-- SAVE BUTTON -->
        <button
            type="submit"
            class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700"
        >
            💾 Save Book
        </button>

        <a
            href="{{ route('books.index') }}"
            class="ml-3 text-gray-600 dark:text-gray-300 underline"
        >
            Cancel
        </a>
    </form>

</div>
@endsection



</body>
</html>
