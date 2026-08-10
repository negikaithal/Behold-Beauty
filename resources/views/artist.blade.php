@extends('layouts.app')

@section('title', 'Meet the Master Artist | Behold Beauty Makeup Studio')

@section('content')
<section style="padding: 5rem 0;" class="bg-secondary">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 4rem; align-items: center;">
            <div>
                <img src="{{ asset('images/artist_portrait.jpg') }}" alt="Lead Makeup Artist Shalu" style="border-radius: var(--radius-lg); border: 8px solid #FFF; box-shadow: var(--shadow-hover);">
            </div>
            <div>
                <span class="section-tag">Master Artist & Founder</span>
                <h1 class="section-heading" style="font-size: 3.2rem; margin-bottom: 1rem;">Shalu Sharma</h1>
                <p style="font-family: var(--font-subheading); font-size: 1.4rem; color: var(--gold-primary); margin-bottom: 1.5rem;">
                    International HD & Airbrush Certified Makeup Specialist
                </p>

                <p style="color: var(--text-secondary); margin-bottom: 1.25rem;">
                    With over 12 years of hands-on experience transforming over 1,200+ brides across India and international destinations, Shalu Sharma brings a refined, editorial eye to traditional Indian bridal beauty.
                </p>
                <p style="color: var(--text-secondary); margin-bottom: 2rem;">
                    "My philosophy is simple: makeup should never look like a mask. It should be a seamless continuation of your inner confidence, enhancing your natural bone structure, highlighting your eyes, and creating skin that looks luminous both in person and on camera."
                </p>

                <div style="display: flex; gap: 2rem; margin-bottom: 2.5rem;">
                    <div>
                        <strong style="font-family: var(--font-heading); font-size: 2rem; color: var(--gold-primary); display: block;">12+</strong>
                        <span style="font-size: 0.85rem; color: var(--text-muted);">Years Experience</span>
                    </div>
                    <div>
                        <strong style="font-family: var(--font-heading); font-size: 2rem; color: var(--gold-primary); display: block;">1,200+</strong>
                        <span style="font-size: 0.85rem; color: var(--text-muted);">Happy Brides</span>
                    </div>
                    <div>
                        <strong style="font-family: var(--font-heading); font-size: 2rem; color: var(--gold-primary); display: block;">15+</strong>
                        <span style="font-size: 0.85rem; color: var(--text-muted);">Industry Awards</span>
                    </div>
                </div>

                <a href="{{ route('booking.create') }}" class="btn btn-gold">
                    ✨ Book Consultation With Shalu
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
