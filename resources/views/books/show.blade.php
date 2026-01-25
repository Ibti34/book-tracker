@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
    <div class="flex gap-6">
        <div class="w-48">
            @if($book->cover_path)
                <img src="{{ asset('storage/' . $book->cover_path) }}" alt="cover" class="w-48 h-64 object-cover rounded">
            @else
                <div class="w-48 h-64 bg-gray-100 flex items-center justify-center text-gray-400">No image</div>
            @endif
        </div>

        <div class="flex-1">
            <h1 class="text-2xl font-bold">{{ $book->title }}</h1>
            <div class="text-gray-600">by {{ $book->author }}</div>

            <div class="mt-4">
                <strong>Status:</strong> {{ $book->status ?? '—' }}
            </div>

            <div class="mt-2">
                <strong>Pages:</strong> {{ $book->pages ?? '—' }}
            </div>

            <div class="mt-2">
                <strong>Current page:</strong> {{ $book->current_page ?? '—' }}
            </div>

            <div class="mt-2">
                <strong>Rating:</strong> {{ $book->rating ? $book->rating . ' ★' : '—' }}
            </div>

            @if($book->notes)
                <div class="mt-4">
                    <strong>Notes</strong>
                    <p class="mt-1 text-gray-700">{{ $book->notes }}</p>
                </div>
            @endif

            <div class="mt-6">
                <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">✏️ Edit</a>
                <a href="{{ route('books.index') }}" class="ml-3 text-gray-600 underline">Back</a>
            </div>

        </div>
    </div>
</div>
@endsection
