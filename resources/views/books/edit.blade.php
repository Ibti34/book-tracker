<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">

    <h1 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">✏️ Edit Book</h1>

    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PUT')

        <!-- TITLE -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Title</label>
            <input
                type="text"
                name="title"
                value="{{ old('title', $book->title) }}"
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
                value="{{ old('author', $book->author) }}"
                class="w-full px-3 py-2 border rounded text-black
                       @error('author') border-red-500 @enderror"
            >
           @error('author')
    <p class="text-red-600 text-sm mt-1">
        {{ $message }}
    </p>
@enderror

        </div>

        <!-- UPDATE BUTTON -->
        <button
            type="submit"
            class="bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700"
        >
            ✅ Update Book
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