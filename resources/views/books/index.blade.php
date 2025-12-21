<!DOCTYPE html>
<html>
<head>
    <title>Book Tracker</title>
</head>
<body>
  
@extends('layouts.app')

@section('content')
<div class="p-6">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800">📚 Book List</h1>

        <a href="{{ route('books.create') }}"
           class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
            ➕ Add Book
        </a>
    </div>

      <form method="GET" action="{{ route('books.index') }}" class="mb-4">
    <input
        type="text"
        name="search"
        placeholder="Search by title or author..."
        value="{{ request('search') }}"
        class="border px-3 py-2 rounded w-64 text-black"
    >

    <button
        type="submit"
        class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700 ml-2"
    >
        🔍 Search
    </button>
</form>

@if (session('success'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
        {{ session('success') }}
    </div>
@endif

    <table class="w-full border rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Author</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($books as $book)
            <tr class="hover:bg-gray-50">
                <td class="p-2 border">{{ $book->title }}</td>
                <td class="p-2 border">{{ $book->author }}</td>
                <td class="p-2 border space-x-2">

                    <a href="{{ route('books.edit', $book) }}"
                       class="bg-yellow-500 text-black px-3 py-1 rounded hover:bg-yellow-600">
                        ✏️ Edit
                    </a>

                    <form method="POST"
                          action="{{ route('books.destroy', $book) }}"
                          class="inline">
                        @csrf
                        @method('DELETE')

                       <button
    type="submit"
    onclick="return confirm('Are you sure you want to delete this book?')"
    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 ml-2"
>
   🗑 Delete
</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
<div class="mt-4">
    {{ $books->withQueryString()->links() }}
</div>

</div>
@endsection

</body>
</html>
