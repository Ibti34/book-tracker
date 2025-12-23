@extends('layouts.app')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800">📚 Book List</h1>

        <a href="{{ route('books.create') }}" class="btn btn-primary">
            ➕ Add Book
        </a>
    </div>

    <!-- SEARCH -->
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

    <!-- SUCCESS MESSAGE -->
    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- SORT BUTTONS -->
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

    <!-- TABLE -->
    <table class="w-full border rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Author</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($books as $book)
            <tr class="hover:bg-gray-50 {{ session('highlight') == $book->id ? 'bg-green-100' : '' }}">
                <td class="p-2 border">{{ $book->title }}</td>
                <td class="p-2 border">{{ $book->author }}</td>

                <td class="p-2 border">
                    <div class="table-actions">
                        <!-- EDIT -->
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-soft">
                            ✏️ Edit
                        </a>

                        <!-- DELETE -->
                        <form method="POST" action="{{ route('books.destroy', $book) }}">
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
                <td colspan="3" class="text-center p-4 text-gray-500">
                    No books found.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!-- PAGINATION -->
    <div class="mt-4">
        {{ $books->withQueryString()->links() }}
    </div>

</div>
@endsection
