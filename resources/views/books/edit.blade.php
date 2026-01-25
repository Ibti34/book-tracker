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

    <form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
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

        <!-- YEAR -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Year</label>
            <input type="number" name="year" value="{{ old('year', $book->year) }}" class="w-full px-3 py-2 border rounded text-black">
        </div>

        <!-- PAGES -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Pages</label>
            <input type="number" name="pages" value="{{ old('pages', $book->pages) }}" class="w-full px-3 py-2 border rounded text-black">
        </div>

        <!-- CURRENT PAGE -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Current Page</label>
            <input type="number" name="current_page" value="{{ old('current_page', $book->current_page) }}" class="w-full px-3 py-2 border rounded text-black">
        </div>

        <!-- RATING -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Rating</label>
            <select name="rating" class="w-full px-3 py-2 border rounded text-black">
                <option value="">—</option>
                @for($i=1;$i<=5;$i++)
                    <option value="{{ $i }}" {{ old('rating', $book->rating) == $i ? 'selected' : '' }}>{{ $i }} star{{ $i>1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>

        <!-- COVER -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Cover Image</label>
            @if($book->cover_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $book->cover_path) }}" alt="cover" class="w-24 h-32 object-cover">
                </div>
            @endif
            <input type="file" name="cover" accept="image/*" class="w-full">
        </div>

        <!-- NOTES -->
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300">Notes</label>
            <textarea name="notes" class="w-full px-3 py-2 border rounded text-black">{{ old('notes', $book->notes) }}</textarea>
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