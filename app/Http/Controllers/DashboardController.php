<?php

namespace App\Http\Controllers;

use App\Models\Book;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', [
            'totalBooks' => Book::count(),
        ]);
    }
}
