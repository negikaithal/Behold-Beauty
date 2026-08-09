@extends('layouts.app')

@section('title', 'Bridal & Pre-Bridal Packages | beholdBeauty')

@section('content')
<section style="padding: 4rem 0 2rem 0; background: var(--bg-secondary); text-align: center;">
    <div class="container">
        <span class="section-tag">All-Inclusive Luxury</span>
        <h1 class="section-heading" style="font-size: 3.5rem;">Bridal Packages & Pre-Bridal Rituals</h1>
        <p class="section-subheading">Choose from our Silver, Gold, and VIP Premium Bridal Packages designed for unforgettable wedding glamour.</p>
    </div>
</section>

<section style="padding: 5rem 0;">
    <div class="container">
        <div class="packages-grid">
            @foreach($bridalPackages as $pkg)
            <div class="package-card {{ $pkg->is_popular ? 'popular' : '' }}">
                @if($pkg->badge)
                <div class="package-ribbon">{{ $pkg->badge }}</div>
                @endif

                <h3 class="package-name">{{ $pkg->name }}</h3>
                <p class="package-tagline">{{ $pkg->tagline }}</p>

                <div class="package-price-wrap">
                    <span class="package-price-val">₹{{ number_format($pkg->price) }}</span>
                    <span style="font-size: 0.85rem; color: var(--text-muted);">/ All Inclusive</span>
                </div>

                <ul class="package-list">
                    @foreach($pkg->features as $item)
                    <li>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>

                <a href="{{ route('booking.create', ['service' => $pkg->name]) }}" class="btn {{ $pkg->is_popular ? 'btn-gold' : 'btn-dark' }}" style="width: 100%;">
                    Book {{ $pkg->name }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
