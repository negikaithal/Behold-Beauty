@extends('layouts.app')

@section('title', 'Behold Beauty Makeup Studio | Luxury Beauty Parlour & Bridal Makeup Artist')

@section('content')

<!-- 1. HERO SECTION -->
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="hero-badge">
                    <span>✨ Award-Winning Bridal & Beauty Lounge</span>
                </div>
                <h1 class="hero-title">
                    Your Beauty, <span>Our Art</span>
                </h1>
                <p class="hero-description">
                    Step into an oasis of pure luxury. We specialize in high-definition HD & Airbrush bridal makeup, personalized skin treatments, couture hair styling, and lavish pre-bridal rituals crafted to accentuate your true radiance.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('booking.create') }}" class="btn btn-gold">
                        ✨ Book Appointment
                    </a>
                    <a href="{{ route('services.index') }}" class="btn btn-outline-gold">
                        💎 Explore Services
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-num">1,200+</div>
                        <div class="stat-label">Brides Transformed</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">100%</div>
                        <div class="stat-label">Sanitized & Imported Products</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">4.9 ★</div>
                        <div class="stat-label">Client Rating</div>
                    </div>
                </div>
            </div>

            <div class="hero-media">
                <div class="hero-img-wrap">
                    <img src="{{ asset('images/hero_bridal_beauty.jpg') }}" alt="High Fashion Indian Bridal Makeup by Behold Beauty Makeup Studio">
                </div>
                <div class="hero-floating-card">
                    <div class="icon-gold">💄</div>
                    <div>
                        <strong style="display: block; font-size: 1rem;">Master Artist Signature</strong>
                        <span style="font-size: 0.85rem; color: var(--text-muted);">HD & Airbrush Specialist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. OUR SERVICES SECTION -->
<section style="padding: 6rem 0;" class="bg-secondary">
    <div class="container">
        <div class="section-title-wrap">
            <span class="section-tag">Curated Beauty Menu</span>
            <h2 class="section-heading">Our Signature Services</h2>
            <p class="section-subheading">From high-fashion bridal makeovers to restorative hair spas and diamond facials.</p>
        </div>

        <div class="services-grid">
            @foreach($featuredServices as $service)
            <div class="service-card">
                <div>
                    <div class="service-card-header">
                        <div>
                            <span class="section-tag" style="font-size: 0.7rem; margin-bottom: 0.2rem;">{{ $service->category }}</span>
                            <h3 class="service-title">{{ $service->name }}</h3>
                        </div>
                        <div class="service-price">₹{{ number_format($service->price) }}</div>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <span class="service-duration">⏱ {{ $service->duration }}</span>
                    </div>
                    <p class="service-desc">{{ $service->description }}</p>
                    @if($service->features)
                    <ul class="service-features">
                        @foreach($service->features as $feat)
                        <li>{{ $feat }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div>
                    <a href="{{ route('booking.create', ['service' => $service->name]) }}" class="btn btn-dark" style="width: 100%; font-size: 0.85rem;">
                        Book This Service
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 3.5rem;">
            <a href="{{ route('services.index') }}" class="btn btn-gold">
                View All 50+ Beauty Services →
            </a>
        </div>
    </div>
</section>

<!-- 3. BRIDAL MAKEUP HIGHLIGHT SECTION -->
<section style="padding: 6rem 0; background: var(--bg-dark); color: var(--text-light); position: relative;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
            <div>
                <img src="{{ asset('images/artist_portrait.jpg') }}" alt="Master Makeup Artist at work" style="border-radius: var(--radius-lg); border: 6px solid rgba(212, 175, 55, 0.3); box-shadow: var(--shadow-gold);">
            </div>
            <div>
                <span class="section-tag">Royal Bridal Experience</span>
                <h2 class="section-heading" style="color: #FFFFFF;">Flawless HD & Airbrush Bridal Artistry</h2>
                <p class="section-subheading" style="color: rgba(255,255,255,0.7); margin-bottom: 1.5rem;">
                    Every bride deserves to feel like royalty. We create bespoke bridal looks tailored to your outfit, jewelry, and personal style—ensuring waterproof, camera-ready perfection from dawn till midnight.
                </p>

                <div style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">
                    <div style="display: flex; gap: 1rem; align-items: flex-start;">
                        <div style="color: var(--gold-primary); font-size: 1.5rem;">👑</div>
                        <div>
                            <strong style="font-size: 1.1rem; color: #FFF;">HD & Silicon Airbrush Mastery</strong>
                            <p style="font-size: 0.9rem; color: rgba(255,255,255,0.6);">Sweat-proof, tear-proof base application that looks lightweight in person and radiant in 4K photography.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1rem; align-items: flex-start;">
                        <div style="color: var(--gold-primary); font-size: 1.5rem;">🌸</div>
                        <div>
                            <strong style="font-size: 1.1rem; color: #FFF;">Complete Pre-Bridal Rituals</strong>
                            <p style="font-size: 0.9rem; color: rgba(255,255,255,0.6);">Body polishing, 24K gold skin hydration, Rica waxing, and customized hair therapy.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1rem; align-items: flex-start;">
                        <div style="color: var(--gold-primary); font-size: 1.5rem;">💫</div>
                        <div>
                            <strong style="font-size: 1.1rem; color: #FFF;">Full Bridal Trial Sessions</strong>
                            <p style="font-size: 0.9rem; color: rgba(255,255,255,0.6);">Personal consultation and makeup trial to experiment with shades before your big day.</p>
                        </div>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <a href="{{ route('bridal-makeup') }}" class="btn btn-gold">
                        Explore Bridal Packages
                    </a>
                    <a href="{{ route('booking.create') }}" class="btn btn-outline-gold">
                        Schedule Bridal Trial
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. BRIDAL PACKAGES SECTION -->
<section style="padding: 6rem 0;">
    <div class="container">
        <div class="section-title-wrap">
            <span class="section-tag">Exclusive Packages</span>
            <h2 class="section-heading">Bridal Packages</h2>
            <p class="section-subheading">All-inclusive luxury packages designed for the bride and her bridal party.</p>
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

<!-- 5. BEFORE & AFTER INTERACTIVE SLIDER SECTION -->
<section style="padding: 6rem 0;" class="bg-secondary">
    <div class="container">
        <div class="section-title-wrap">
            <span class="section-tag">Real Transformations</span>
            <h2 class="section-heading">Bare to Bridal Glam</h2>
            <p class="section-subheading">Drag the slider below to witness our signature flawless skin correction & makeup transformation.</p>
        </div>

        <div class="before-after-container">
            <img src="{{ asset('images/before_bare.jpg') }}" class="ba-image ba-before" alt="Natural Bare Face Skin">
            <div class="ba-badge ba-badge-before">BEFORE (Bare Skin)</div>

            <div class="ba-after-wrapper">
                <img src="{{ asset('images/after_glam.jpg') }}" class="ba-image" alt="Transformed HD Bridal Makeup">
                <div class="ba-badge ba-badge-after">AFTER (Behold Beauty Glam)</div>
            </div>

            <div class="ba-slider-handle">
                <div class="ba-handle-button">↔</div>
            </div>
        </div>
    </div>
</section>

<!-- 6. WHY CHOOSE US -->
<section style="padding: 6rem 0;">
    <div class="container">
        <div class="section-title-wrap">
            <span class="section-tag">The Behold Beauty Gold Standard</span>
            <h2 class="section-heading">Why Brides Trust Us</h2>
            <p class="section-subheading">We combine artistic passion with strict hygienic safety standards and luxury comfort.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
            <div style="background: var(--bg-card); padding: 2rem; border-radius: var(--radius-md); border: 1px solid var(--rose-border); text-align: center;">
                <div style="font-size: 2.5rem; color: var(--gold-primary); margin-bottom: 1rem;">🏆</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem;">Certified Master Artists</h3>
                <p style="font-size: 0.9rem; color: var(--text-secondary);">Trained under international beauty academies with 10+ years of experience in Indian bridal traditions.</p>
            </div>

            <div style="background: var(--bg-card); padding: 2rem; border-radius: var(--radius-md); border: 1px solid var(--rose-border); text-align: center;">
                <div style="font-size: 2.5rem; color: var(--gold-primary); margin-bottom: 1rem;">✨</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem;">100% Sanitized Tools</h3>
                <p style="font-size: 0.9rem; color: var(--text-secondary);">Single-use disposables, UV sterilized brushes, and strict clinical hygiene protocols for your safety.</p>
            </div>

            <div style="background: var(--bg-card); padding: 2rem; border-radius: var(--radius-md); border: 1px solid var(--rose-border); text-align: center;">
                <div style="font-size: 2.5rem; color: var(--gold-primary); margin-bottom: 1rem;">💄</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem;">Luxury Imported Cosmetics</h3>
                <p style="font-size: 0.9rem; color: var(--text-secondary);">We exclusively use Charlotte Tilbury, MAC, NARS, Dior, Huda Beauty, and Bobbi Brown cosmetics.</p>
            </div>

            <div style="background: var(--bg-card); padding: 2rem; border-radius: var(--radius-md); border: 1px solid var(--rose-border); text-align: center;">
                <div style="font-size: 2.5rem; color: var(--gold-primary); margin-bottom: 1rem;">🏡</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem;">Studio & Venue Services</h3>
                <p style="font-size: 0.9rem; color: var(--text-secondary);">Enjoy our ultra-luxury studio lounge or book our artists to travel directly to your destination venue.</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. FILTERABLE GALLERY -->
<section style="padding: 6rem 0;" class="bg-secondary">
    <div class="container">
        <div class="section-title-wrap">
            <span class="section-tag">Lookbook & Portfolio</span>
            <h2 class="section-heading">Our Beauty Gallery</h2>
            <p class="section-subheading">Filter through our recent bridal makeovers, party looks, nail art, and hair styling.</p>
        </div>

        <div class="gallery-filters">
            @foreach($galleryCategories as $cat)
            <button class="filter-btn {{ $loop->first ? 'active' : '' }}" data-filter="{{ $cat }}">
                {{ $cat }}
            </button>
            @endforeach
        </div>

        <div class="gallery-grid">
            @foreach($portfolioItems as $item)
            <div class="gallery-item" data-category="{{ $item->category }}">
                <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}">
                <div class="gallery-overlay">
                    <span class="gallery-cat">{{ $item->category }}</span>
                    <h4 class="gallery-title">{{ $item->title }}</h4>
                    <span style="font-size: 0.8rem; color: #DDD;">Client: {{ $item->client_name }}</span>
                </div>
            </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <a href="{{ route('gallery') }}" class="btn btn-outline-gold">Explore Full Gallery</a>
        </div>
    </div>
</section>

<!-- 8. CUSTOMER TESTIMONIALS -->
<section style="padding: 6rem 0;">
    <div class="container">
        <div class="section-title-wrap">
            <span class="section-tag">Client Love</span>
            <h2 class="section-heading">Words From Our Brides</h2>
            <p class="section-subheading">Read real reviews from women who entrusted their special day to Behold Beauty Makeup Studio.</p>
        </div>

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

<!-- 9. INSTAGRAM REEL / GALLERY FEED -->
<section style="padding: 4rem 0; background: var(--bg-dark); color: #FFF;">
    <div class="container" style="text-align: center;">
        <span class="section-tag">Follow Us On Instagram</span>
        <h2 class="section-heading" style="color: #FFF; font-size: 2.2rem; margin-bottom: 2rem;">@beholdbeautymakeupstudio</h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
            <img src="{{ asset('images/hero_bridal_beauty.jpg') }}" alt="Insta Post 1" style="border-radius: var(--radius-sm); aspect-ratio: 1/1; object-fit: cover;">
            <img src="{{ asset('images/artist_portrait.jpg') }}" alt="Insta Post 2" style="border-radius: var(--radius-sm); aspect-ratio: 1/1; object-fit: cover;">
            <img src="{{ asset('images/after_glam.jpg') }}" alt="Insta Post 3" style="border-radius: var(--radius-sm); aspect-ratio: 1/1; object-fit: cover;">
            <img src="{{ asset('images/nail_art_look.jpg') }}" alt="Insta Post 4" style="border-radius: var(--radius-sm); aspect-ratio: 1/1; object-fit: cover;">
            <img src="{{ asset('images/salon_interior.jpg') }}" alt="Insta Post 5" style="border-radius: var(--radius-sm); aspect-ratio: 1/1; object-fit: cover;">
        </div>

        <a href="https://instagram.com" target="_blank" class="btn btn-gold">
            📸 Follow @beholdbeautymakeupstudio
        </a>
    </div>
</section>

<!-- 10. BOOKING CTA BANNER -->
<section style="padding: 6rem 0; background: radial-gradient(circle, #F7ECE1 0%, #EADBCE 100%); text-align: center;">
    <div class="container" style="max-width: 800px;">
        <span class="section-tag">Reserve Your Spot</span>
        <h2 class="section-heading" style="font-size: 3rem; margin-bottom: 1.25rem;">Ready to Reveal Your Radiance?</h2>
        <p class="section-subheading" style="margin-bottom: 2.5rem;">
            Book your appointment online today or schedule a complimentary bridal makeup consultation with our senior artists.
        </p>
        <div style="display: flex; gap: 1.5rem; justify-content: center;">
            <a href="{{ route('booking.create') }}" class="btn btn-gold" style="font-size: 1.1rem; padding: 1rem 2.5rem;">
                ✨ Book Appointment Now
            </a>
            <a href="https://wa.me/918882123089" target="_blank" class="btn btn-dark" style="font-size: 1.1rem; padding: 1rem 2.5rem;">
                💬 Chat on WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
