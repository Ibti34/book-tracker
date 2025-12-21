<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl">

    <h1 class="text-2xl font-bold mb-4 text-gray-800">➕ Add Book</h1>

    <form method="POST" action="{{ route('books.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold text-gray-700">Title</label>
            <input type="text" name="title" required
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Author</label>
            <input type="text" name="author" required
                   class="w-full border rounded p-2">
        </div>

        <button type="submit"
                class="bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700">
            💾 Save
        </button>

        <a href="/books" class="ml-4 text-blue-600 hover:underline">← Back</a>
    </form>
</div>
@endsection


</body>
</html>
