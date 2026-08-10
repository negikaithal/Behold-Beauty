@extends('layouts.app')

@section('title', 'HD & Airbrush Bridal Makeup Lounge | Behold Beauty Makeup Studio')

@section('content')

<!-- Bridal Hero -->
<section style="padding: 5rem 0; background: var(--bg-dark); color: #FFF; position: relative;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 4rem; align-items: center;">
            <div>
                <span class="section-tag">High Couture Artistry</span>
                <h1 class="section-heading" style="color: #FFF; font-size: 3.5rem; margin-bottom: 1.5rem;">
                    Bespoke Bridal Makeup & Styling
                </h1>
                <p class="section-subheading" style="color: rgba(255,255,255,0.7); margin-bottom: 2rem;">
                    From intimate court weddings to grand royal palace receptions, we craft personalized bridal looks tailored to your skin tone, outfit colors, and ancestral heritage.
                </p>
                <div style="display: flex; gap: 1rem;">
                    <a href="{{ route('booking.create') }}" class="btn btn-gold">
                        ✨ Reserve Wedding Date
                    </a>
                    <a href="#bridal-services" class="btn btn-outline-gold">
                        Browse Bridal Services
                    </a>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/hero_bridal_beauty.jpg') }}" alt="Bridal Glam" style="border-radius: var(--radius-lg); border: 8px solid rgba(212,175,55,0.3); box-shadow: var(--shadow-gold);">
            </div>
        </div>
    </div>
</section>

<!-- Bridal Services Menu -->
<section id="bridal-services" style="padding: 5rem 0;">
    <div class="container">
        <div class="section-title-wrap">
            <span class="section-tag">Specialized Offerings</span>
            <h2 class="section-heading">Bridal Makeup Options</h2>
            <p class="section-subheading">Choose your preferred application technique and occasion makeover.</p>
        </div>

        <div class="services-grid">
            @foreach($bridalServices as $srv)
            <div class="service-card">
                <div>
                    <div class="service-card-header">
                        <div>
                            <span class="section-tag" style="font-size: 0.7rem; margin-bottom: 0.2rem;">Bridal Artistry</span>
                            <h3 class="service-title" style="font-size: 1.4rem;">{{ $srv->name }}</h3>
                        </div>
                        <div class="service-price">₹{{ number_format($srv->price) }}</div>
                    </div>
                    <div style="margin-bottom: 0.75rem;">
                        <span class="service-duration">⏱ {{ $srv->duration }}</span>
                    </div>
                    <p class="service-desc">{{ $srv->description }}</p>
                </div>

                <div style="margin-top: 1rem;">
                    <a href="{{ route('booking.create', ['service' => $srv->name]) }}" class="btn btn-gold" style="width: 100%;">
                        Book {{ $srv->name }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Pre-Bridal Services -->
<section style="padding: 5rem 0;" class="bg-secondary">
    <div class="container">
        <div class="section-title-wrap">
            <span class="section-tag">Pre-Bridal Glow</span>
            <h2 class="section-heading">Pre-Bridal Treatments</h2>
            <p class="section-subheading">Essential skin polishing, hydration, waxing, and hair pampering leading up to your wedding day.</p>
        </div>

        <div class="services-grid">
            @foreach($preBridalServices as $srv)
            <div class="service-card">
                <div>
                    <div class="service-card-header">
                        <div>
                            <span class="section-tag" style="font-size: 0.7rem;">Pre-Bridal</span>
                            <h3 class="service-title" style="font-size: 1.3rem;">{{ $srv->name }}</h3>
                        </div>
                        <div class="service-price">₹{{ number_format($srv->price) }}</div>
                    </div>
                    <div style="margin-bottom: 0.75rem;">
                        <span class="service-duration">⏱ {{ $srv->duration }}</span>
                    </div>
                    <p class="service-desc">{{ $srv->description }}</p>
                </div>

                <div style="margin-top: 1rem;">
                    <a href="{{ route('booking.create', ['service' => $srv->name]) }}" class="btn btn-dark" style="width: 100%;">
                        Book Treatment
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Bridal Packages -->
<section style="padding: 5rem 0;">
    <div class="container">
        <div class="section-title-wrap">
            <span class="section-tag">Curated Bundles</span>
            <h2 class="section-heading">All-Inclusive Bridal Packages</h2>
            <p class="section-subheading">Complete head-to-toe transformations for your wedding celebrations.</p>
        </div>

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
                    Reserve Package
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
