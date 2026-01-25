<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

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

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'author'       => 'required|string|max:255',
            'year'         => 'nullable|integer',
            'description'  => 'nullable|string',
            'pages'        => 'nullable|integer|min:1',
            'current_page' => 'nullable|integer|min:0',
            'rating'       => 'nullable|integer|min:1|max:5',
            'cover'        => 'nullable|image|max:2048',
            'status'       => 'nullable|string|max:50',
            'priority'     => 'nullable|in:low,normal,high',
            'notes'        => 'nullable|string',
            'tags'         => 'nullable|string',
        ]);

        // If the optional tracker columns haven't been migrated yet, show clear message.
        $requiredExtra = ['pages', 'current_page', 'rating', 'cover_path'];
        $hasExtra = true;
        foreach ($requiredExtra as $col) {
            if (! Schema::hasColumn('books', $col)) {
                $hasExtra = false;
                break;
            }
        }

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('covers', 'public');
            $validated['cover_path'] = $path;
        }

        if (! $hasExtra) {
            // Save the basic fields (title, author, year, description) to avoid data loss,
            // but tell the user to run migrations so the rest of the fields work.
            $basic = array_intersect_key($validated, array_flip(['title', 'author', 'year', 'description']));
            $book = Book::create($basic);

            return redirect()->route('books.index')
                ->with('success', 'Book saved (basic fields). Additional tracker fields require running migrations. Run: php artisan migrate')
                ->with('highlight', $book->id);
        }

        // All good — save all available validated fields.
        $book = Book::create($validated);

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
            'title'        => 'required|string|max:255',
            'author'       => 'required|string|max:255',
            'year'         => 'nullable|integer',
            'description'  => 'nullable|string',
            'pages'        => 'nullable|integer|min:1',
            'current_page' => 'nullable|integer|min:0',
            'rating'       => 'nullable|integer|min:1|max:5',
            'cover'        => 'nullable|image|max:2048',
            'status'       => 'nullable|string|max:50',
            'priority'     => 'nullable|in:low,normal,high',
            'notes'        => 'nullable|string',
            'tags'         => 'nullable|string',
        ]);


        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('covers', 'public');
            $validated['cover_path'] = $path;
        }

        // If tracker columns are missing, update only basic fields and instruct to run migrations.
        $requiredExtra = ['pages', 'current_page', 'rating', 'cover_path'];
        $hasExtra = true;
        foreach ($requiredExtra as $col) {
            if (! Schema::hasColumn('books', $col)) {
                $hasExtra = false;
                break;
            }
        }

        if (! $hasExtra) {
            $basic = array_intersect_key($validated, array_flip(['title', 'author', 'year', 'description']));
            $book->update($basic);

            return redirect()->route('books.index')
                ->with('success', 'Book updated (basic fields). Additional tracker fields require running migrations. Run: php artisan migrate')
                ->with('highlight', $book->id);
        }

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
