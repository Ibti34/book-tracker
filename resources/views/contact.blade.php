@extends('layouts.app')

@section('content')
<div class="contact-container">
    <h1>Contact Us</h1>

    <form class="contact-form" method="POST" action="#">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter your name">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email">
        </div>

        <div>
            <label>Message</label>
            <textarea name="message" rows="5" placeholder="Write your message"></textarea>
        </div>

        <button type="submit">Send Message</button>
    </form>
</div>
@endsection
