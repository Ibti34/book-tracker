@extends('layouts.app')

@section('content')
<style>
    /* Force Progress Bar to Green */
    .custom-progress-bg {
        background-color: #22c55e !important; /* Green */
    }
    /* Force Star to Yellow */
    .custom-star-color {
        color: #facc15 !important; /* Yellow */
        font-weight: bold;
        font-size: 1.2rem;
    }
</style>

<div class="p-6">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800">📚 Book List</h1>

        <a href="{{ route('books.create') }}" class="btn btn-primary">
            ➕ Add Book
        </a>
    </div>

    <form method="GET" action="{{ route('books.index') }}" class="flex items-center gap-2 mb-4">
        <input
            type="text"
            name="search"
            placeholder="Search by title or author..."
            value="{{ request('search') }}"
            class="border px-3 py-2 rounded w-64"
        >

        <button type="submit" class="btn btn-primary">
            🔍 Search
        </button>

        @if(request('search'))
            <a href="{{ route('books.index') }}" class="btn btn-soft">
                ❌ Clear
            </a>
        @endif
    </form>

    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex gap-2 mb-4">
        <a href="{{ route('books.index', array_merge(request()->all(), ['sort' => 'az'])) }}"
           class="btn btn-soft">
            🔤 Title A–Z
        </a>

        <a href="{{ route('books.index', array_merge(request()->all(), ['sort' => 'za'])) }}"
           class="btn btn-soft">
            🔡 Title Z–A
        </a>
    </div>

    <table class="w-full border rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Cover</th>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Author</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Progress</th>
                <th class="p-2 border">Rating</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($books as $book)
            @php
                $progress = 0;
                if ($book->pages && $book->current_page) {
                    $progress = (int) min(100, round(($book->current_page / $book->pages) * 100));
                }
            @endphp
            <tr class="hover:bg-gray-50 {{ session('highlight') == $book->id ? 'bg-green-100' : '' }}">
                <td class="p-2 border w-24">
                    @if($book->cover_path)
                        <img src="{{ asset('storage/' . $book->cover_path) }}" alt="cover" class="w-16 h-20 object-cover">
                    @else
                        <div class="w-16 h-20 bg-gray-100 flex items-center justify-center text-sm text-gray-400">No image</div>
                    @endif
                </td>

                <td class="p-2 border">{{ $book->title }}</td>
                <td class="p-2 border">{{ $book->author }}</td>
                <td class="p-2 border">{{ $book->status ?? '—' }}</td>
                <td class="p-2 border w-48">
                    <div class="w-full bg-gray-200 rounded h-3">
                        <div class="custom-progress-bg h-3 rounded" style="width: {{ $progress }}%"></div>
                    </div>
                    <div class="text-sm text-gray-600">{{ $progress }}%</div>
                </td>
                <td class="p-2 border">
                    @if($book->rating)
                        {{ $book->rating }} <span class="custom-star-color">★</span>
                    @else
                        —
                    @endif
                </td>

                <td class="p-2 border">
                    <div class="table-actions">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-soft">🔍 View</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-soft">✏️ Edit</a>

                        <form method="POST" action="{{ route('books.destroy', $book) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                onclick="return confirm('Are you sure you want to delete this book?')"
                                class="btn btn-danger"
                            >
                                🗑 Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center p-4 text-gray-500">No books found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $books->withQueryString()->links() }}
    </div>

</div>
@endsection