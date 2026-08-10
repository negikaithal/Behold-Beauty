@extends('layouts.app')

@section('title', 'Client Testimonials & Reviews | Behold Beauty Makeup Studio')

@section('content')
<section style="padding: 4rem 0 2rem 0; background: var(--bg-secondary); text-align: center;">
    <div class="container">
        <span class="section-tag">Loved By Brides</span>
        <h1 class="section-heading" style="font-size: 3.5rem;">Client Reviews & Ratings</h1>
        <p class="section-subheading">Read authentic feedback from our delighted clients and brides.</p>
    </div>
</section>

<section style="padding: 5rem 0;">
    <div class="container">
        <div class="reviews-grid">
            @foreach($reviews as $rev)
            <div class="review-card">
                <div>
                    <div class="review-stars">
                        @for($i=0; $i<$rev->rating; $i++) ★ @endfor
                    </div>
                    <p class="review-text">"{{ $rev->review_text }}"</p>
                </div>
                <div class="review-author">
                    <img src="{{ asset($rev->customer_photo ?? 'images/artist_portrait.jpg') }}" class="review-avatar" alt="{{ $rev->customer_name }}">
                    <div>
                        <div class="author-name">{{ $rev->customer_name }}</div>
                        <div class="author-service">{{ $rev->service_taken }} • {{ $rev->event_date }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
