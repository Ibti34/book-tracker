<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
    public function index()
    {
        return Book::latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        return Book::create($validated);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $book->update($validated);

        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
