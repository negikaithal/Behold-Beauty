@extends('layouts.app')

@section('title', 'Booking Confirmed | beholdBeauty')

@section('content')
<section style="padding: 5rem 0;" class="bg-secondary">
    <div class="container" style="max-width: 750px;">
        <div style="background: var(--bg-card); padding: 3.5rem 2.5rem; border-radius: var(--radius-lg); border: 2px solid var(--gold-primary); box-shadow: var(--shadow-hover); text-align: center;">

            <div style="width: 80px; height: 80px; background: var(--gold-light); color: var(--gold-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 1.5rem auto;">
                ✓
            </div>

            <span class="section-tag">Appointment Reserved</span>
            <h1 class="section-heading" style="font-size: 2.5rem; margin-bottom: 0.5rem;">Thank You, {{ $booking->customer_name }}!</h1>
            <p style="color: var(--text-secondary); margin-bottom: 2rem;">
                Your appointment request has been successfully recorded in our system. Our studio receptionist will call you shortly to confirm details.
            </p>

            <div style="background: var(--bg-primary); padding: 1.75rem; border-radius: var(--radius-md); border: 1px solid var(--rose-border); text-align: left; margin-bottom: 2.5rem;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; padding-bottom: 0.75rem; border-bottom: 1px dashed var(--rose-border);">
                    <strong style="color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase;">Booking Reference</strong>
                    <strong style="color: var(--gold-primary); font-family: var(--font-heading); font-size: 1.2rem;">{{ $booking->booking_number }}</strong>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; font-size: 0.95rem;">
                    <div>
                        <span style="color: var(--text-muted); display: block; font-size: 0.8rem;">Category</span>
                        <strong>{{ $booking->service_category }}</strong>
                    </div>
                    <div>
                        <span style="color: var(--text-muted); display: block; font-size: 0.8rem;">Selected Service</span>
                        <strong>{{ $booking->specific_service }}</strong>
                    </div>
                    <div>
                        <span style="color: var(--text-muted); display: block; font-size: 0.8rem;">Date & Time</span>
                        <strong>{{ $booking->preferred_date->format('M d, Y') }} at {{ $booking->preferred_time }}</strong>
                    </div>
                    <div>
                        <span style="color: var(--text-muted); display: block; font-size: 0.8rem;">Party Size</span>
                        <strong>{{ $booking->number_of_people }} Person(s)</strong>
                    </div>
                    <div>
                        <span style="color: var(--text-muted); display: block; font-size: 0.8rem;">Phone</span>
                        <strong>{{ $booking->phone }}</strong>
                    </div>
                    <div>
                        <span style="color: var(--text-muted); display: block; font-size: 0.8rem;">Email</span>
                        <strong>{{ $booking->email }}</strong>
                    </div>
                </div>

                @if($booking->message)
                <div style="margin-top: 1rem; padding-top: 0.75rem; border-top: 1px dashed var(--rose-border);">
                    <span style="color: var(--text-muted); display: block; font-size: 0.8rem;">Special Note</span>
                    <p style="font-size: 0.9rem; color: var(--text-secondary); font-style: italic;">"{{ $booking->message }}"</p>
                </div>
                @endif
            </div>

            <div style="display: flex; gap: 1rem; justify-content: center;">
                <a href="https://wa.me/919876543210?text=Hi!%20I%20just%20submitted%20booking%20ref%20{{ $booking->booking_number }}%20for%20{{ urlencode($booking->customer_name) }}." target="_blank" class="btn btn-gold">
                    💬 Connect on WhatsApp
                </a>
                <a href="{{ route('home') }}" class="btn btn-dark">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
