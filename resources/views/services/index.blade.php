@extends('layouts.app')

@section('title', 'Beauty & Makeup Services Menu | beholdBeauty')

@section('content')
<section style="padding: 4rem 0 2rem 0; background: var(--bg-secondary); text-align: center;">
    <div class="container">
        <span class="section-tag">Luxurious Care Menu</span>
        <h1 class="section-heading" style="font-size: 3.5rem;">Beauty & Makeup Services</h1>
        <p class="section-subheading">Explore our full repertoire of hair treatments, glowing facials, threading, waxing, gel manicure, and HD makeup.</p>
    </div>
</section>

<!-- Service Categories Jump Nav -->
<section style="padding: 1.5rem 0; background: #FFFFFF; border-bottom: 1px solid var(--rose-border); position: sticky; top: 85px; z-index: 900;">
    <div class="container">
        <div style="display: flex; gap: 0.75rem; overflow-x: auto; padding-bottom: 0.5rem;">
            @foreach($categories as $cat)
            <a href="#cat-{{ Str::slug($cat) }}" class="btn btn-outline-gold" style="font-size: 0.8rem; padding: 0.5rem 1.25rem; white-space: nowrap;">
                {{ $cat }}
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Categorized Services Lists -->
<section style="padding: 4rem 0;">
    <div class="container">
        @foreach($categories as $category)
        <div id="cat-{{ Str::slug($category) }}" style="margin-bottom: 5rem; scroll-margin-top: 160px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; border-bottom: 2px solid var(--gold-primary); padding-bottom: 0.75rem;">
                <div>
                    <span class="section-tag" style="margin-bottom: 0.2rem;">Category</span>
                    <h2 style="font-size: 2.2rem;">{{ $category }}</h2>
                </div>
                <a href="{{ route('booking.create') }}" class="btn btn-gold" style="font-size: 0.85rem; padding: 0.5rem 1.25rem;">
                    Book Appointment
                </a>
            </div>

            @if(isset($servicesGrouped[$category]))
            <div class="services-grid">
                @foreach($servicesGrouped[$category] as $service)
                <div class="service-card">
                    <div>
                        <div class="service-card-header">
                            <div>
                                @if($service->subcategory)
                                <span style="font-size: 0.75rem; color: var(--gold-primary); font-weight: 600;">{{ $service->subcategory }}</span>
                                @endif
                                <h3 class="service-title" style="font-size: 1.35rem;">{{ $service->name }}</h3>
                            </div>
                            <div class="service-price">₹{{ number_format($service->price) }}</div>
                        </div>
                        <div style="margin-bottom: 0.75rem;">
                            <span class="service-duration">⏱ {{ $service->duration }}</span>
                        </div>
                        <p class="service-desc">{{ $service->description }}</p>
                    </div>

                    <div style="margin-top: 1rem;">
                        <a href="{{ route('booking.create', ['service' => $service->name]) }}" class="btn btn-dark" style="width: 100%; font-size: 0.85rem;">
                            Book This Service
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p style="color: var(--text-muted);">Services for this category will be listed shortly.</p>
            @endif
        </div>
        @endforeach
    </div>
</section>
@endsection
