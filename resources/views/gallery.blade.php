@extends('layouts.app')

@section('title', 'Photo Gallery & Lookbook | beholdBeauty')

@section('content')
<section style="padding: 4rem 0 2rem 0; background: var(--bg-secondary); text-align: center;">
    <div class="container">
        <span class="section-tag">Visual Perfection</span>
        <h1 class="section-heading" style="font-size: 3.5rem;">Portfolio & Gallery</h1>
        <p class="section-subheading">Click on any image to view in full resolution.</p>
    </div>
</section>

<section style="padding: 4rem 0;">
    <div class="container">
        <div class="gallery-filters">
            @foreach($categories as $cat)
            <button class="filter-btn {{ $loop->first ? 'active' : '' }}" data-filter="{{ $cat }}">
                {{ $cat }}
            </button>
            @endforeach
        </div>

        <div class="gallery-grid">
            @foreach($items as $item)
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
    </div>
</section>
@endsection
