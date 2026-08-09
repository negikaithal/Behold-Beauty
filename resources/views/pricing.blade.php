@extends('layouts.app')

@section('title', 'Transparent Price List | beholdBeauty Salon')

@section('content')
<section style="padding: 4rem 0 2rem 0; background: var(--bg-secondary); text-align: center;">
    <div class="container">
        <span class="section-tag">100% Transparent Rates</span>
        <h1 class="section-heading" style="font-size: 3.5rem;">Services Pricing Menu</h1>
        <p class="section-subheading">No hidden fees. Premium international cosmetics & sanitized service guaranteed.</p>
    </div>
</section>

<section style="padding: 5rem 0;">
    <div class="container" style="max-width: 1000px;">
        @foreach($servicesGrouped as $category => $services)
        <div style="margin-bottom: 4rem;">
            <h2 style="font-size: 2rem; border-bottom: 2px solid var(--gold-primary); padding-bottom: 0.5rem; margin-bottom: 1.5rem;">
                {{ $category }}
            </h2>

            <div style="background: var(--bg-card); border-radius: var(--radius-md); border: 1px solid var(--rose-border); overflow: hidden; box-shadow: var(--shadow-soft);">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="background: var(--rose-light); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-primary);">
                            <th style="padding: 1rem 1.5rem;">Service Name</th>
                            <th style="padding: 1rem 1.5rem;">Duration</th>
                            <th style="padding: 1rem 1.5rem;">Price (INR)</th>
                            <th style="padding: 1rem 1.5rem; text-align: right;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $srv)
                        <tr style="border-bottom: 1px solid var(--rose-border);">
                            <td style="padding: 1.2rem 1.5rem; font-weight: 600;">
                                {{ $srv->name }}
                                @if($srv->is_featured)
                                <span style="font-size: 0.7rem; background: var(--gold-light); color: var(--gold-primary); padding: 0.2rem 0.5rem; border-radius: var(--radius-full); margin-left: 0.5rem;">Popular</span>
                                @endif
                            </td>
                            <td style="padding: 1.2rem 1.5rem; color: var(--text-muted); font-size: 0.9rem;">{{ $srv->duration }}</td>
                            <td style="padding: 1.2rem 1.5rem; font-family: var(--font-heading); font-size: 1.25rem; font-weight: 700; color: var(--gold-primary);">
                                ₹{{ number_format($srv->price) }}
                            </td>
                            <td style="padding: 1.2rem 1.5rem; text-align: right;">
                                <a href="{{ route('booking.create', ['service' => $srv->name]) }}" class="btn btn-dark" style="font-size: 0.8rem; padding: 0.4rem 1rem;">
                                    Book Now
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
