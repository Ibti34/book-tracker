<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        // SEARCH
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%');
        }

        // SORT
        if ($request->sort == 'az') {
            $query->orderBy('title', 'asc');
        } elseif ($request->sort == 'za') {
            $query->orderBy('title', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $books = $query->paginate(5);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = Book::create([
            'title'  => $request->title,
            'author' => $request->author,
        ]);

        return redirect()
            ->route('books.index')
            ->with([
                'success'   => '📘 Book added successfully!',
                'highlight' => $book->id,
            ]);
    }

    // ✅ THIS WAS MISSING
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with([
                'success'   => '✏️ Book updated successfully!',
                'highlight' => $book->id,
            ]);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', '🗑️ Book deleted successfully!');
    }

    public function dashboard()
    {
        return view('dashboard', [
            'totalBooks' => Book::count()
        ]);
    }
}
