@extends('layouts.app')

@section('title', 'About Us | beholdBeauty Luxury Salon & Bridal Lounge')

@section('content')
<section style="padding: 5rem 0; background: var(--bg-secondary);">
    <div class="container" style="text-align: center; max-width: 850px;">
        <span class="section-tag">Our Heritage</span>
        <h1 class="section-heading" style="font-size: 3.5rem;">Redefining Elegance & Luxury</h1>
        <p class="section-subheading">
            Established with a passion for high-fashion artistry and clinical hygiene, beholdBeauty is a sanctuary designed for women who demand perfection.
        </p>
    </div>
</section>

<section style="padding: 5rem 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; margin-bottom: 5rem;">
            <div>
                <span class="section-tag">The Studio Experience</span>
                <h2 class="section-heading">State-of-the-Art Salon & Private Suites</h2>
                <p style="color: var(--text-secondary); margin-bottom: 1.5rem;">
                    Our salon features private bridal dressing suites, ambient ring lights, plush velvet reclining chairs, and a calming aromatherapy atmosphere. Every detail is curated to make your beauty treatment feel like a retreat.
                </p>
                <ul class="service-features" style="margin-bottom: 2rem;">
                    <li>Private sound-proof VIP bridal changing rooms</li>
                    <li>Individual sanitized tool kits for every client</li>
                    <li>Complimentary gourmet tea & espresso bar</li>
                    <li>Custom lighting tailored for accurate shade matching</li>
                </ul>
            </div>
            <div>
                <img src="{{ asset('images/salon_interior.jpg') }}" alt="beholdBeauty Studio Interior" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-hover);">
            </div>
        </div>
    </div>
</section>
@endsection
