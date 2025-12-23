@extends('layouts.app')

@section('content')
<section class="services-section">

    <h2 class="services-title">Our Services</h2>

    <div class="services-grid">

        <div class="service-card">
            <div class="service-icon">📚</div>
            <h3>Book Lists</h3>
            <p>
                Organize your books into custom lists like
                <strong>To Read</strong>, <strong>Currently Reading</strong>,
                and <strong>Finished</strong>.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">✍️</div>
            <h3>Reading Tracker</h3>
            <p>
                Track your daily reading progress including pages,
                chapters, and personal notes.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">⭐</div>
            <h3>Book Ratings & Reviews</h3>
            <p>
                Rate and review books you’ve read and help others
                choose their next favorite.
            </p>
        </div>

    </div>

</section>
@endsection
