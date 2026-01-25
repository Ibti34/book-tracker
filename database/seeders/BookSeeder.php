<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\Schema;

class BookSeeder extends Seeder
{
    public function run()
    {
        $item = [
            'title' => 'The Pragmatic Programmer',
            'author' => 'Andrew Hunt',
            'year' => 1999,
            'description' => 'A classic on software craftsmanship',
            'status' => 'completed',
            'pages' => 352,
            'current_page' => 352,
            'rating' => 5,
            'priority' => 'normal',
            'notes' => 'Excellent practical advice for developers.'
        ];

        $data = [];
        foreach ($item as $k => $v) {
            if (Schema::hasColumn('books', $k)) {
                $data[$k] = $v;
            }
        }
        Book::create($data);

        $item = [
            'title' => 'Atomic Habits',
            'author' => 'James Clear',
            'year' => 2018,
            'description' => 'Tiny changes, remarkable results',
            'status' => 'reading',
            'pages' => 320,
            'current_page' => 45,
            'rating' => 4,
            'priority' => 'high',
            'notes' => 'Useful habits framework.'
        ];
        $data = [];
        foreach ($item as $k => $v) {
            if (Schema::hasColumn('books', $k)) {
                $data[$k] = $v;
            }
        }
        Book::create($data);

        $item = [
            'title' => 'Clean Code',
            'author' => 'Robert C. Martin',
            'year' => 2008,
            'description' => 'Guide to writing clean code',
            'status' => 'to-read',
            'pages' => 464,
            'current_page' => 0,
            'priority' => 'normal'
        ];
        $data = [];
        foreach ($item as $k => $v) {
            if (Schema::hasColumn('books', $k)) {
                $data[$k] = $v;
            }
        }
        Book::create($data);
    }
}
