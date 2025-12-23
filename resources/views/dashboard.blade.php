@extends('layouts.app')

@section('content')
<div class="container" style="padding:40px 0">

    <h1>📊 Dashboard</h1>

    <div style="
        background:#fff;
        padding:30px;
        border-radius:16px;
        max-width:400px;
        box-shadow:0 10px 25px rgba(0,0,0,.08)
    ">
        <h3>Total Books</h3>
        <p style="font-size:2rem;font-weight:bold">
            {{ $totalBooks }}
        </p>

        <a href="{{ route('books.index') }}" class="btn btn-primary">
            View Books
        </a>
    </div>

</div>
@endsection
