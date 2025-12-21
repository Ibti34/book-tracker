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
<div class="p-6 max-w-xl">

    <h1 class="text-2xl font-bold mb-4 text-gray-800">✏️ Edit Book</h1>

    <form method="POST" action="{{ route('books.update', $book) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $book->title }}" required
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Author</label>
            <input type="text" name="author" value="{{ $book->author }}" required
                   class="w-full border rounded p-2">
        </div>

        <button type="submit"
                class="bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700">
            🔄 Update
        </button>

        <a href="/books" class="ml-4 text-blue-600 hover:underline">← Back</a>
    </form>
</div>
@endsection


</body>
</html>