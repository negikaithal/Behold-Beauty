<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'beholdBeauty | Luxury Beauty Parlour & Professional Makeup Artist')</title>
    <meta name="description" content="Premium Beauty Parlour & Professional Makeup Artist specializing in HD Bridal Makeup, Airbrush Makeup, Hair Styling, Luxury Facials, and Complete Pre-Bridal Packages.">
    
    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @yield('extra_css')
</head>
<body>

    <!-- Top Contact Bar -->
    <div class="navbar-top">
        <div class="container">
            <div class="nav-contact-info">
                <span>📍 104 Luxury Square, MG Road, Studio #4, New Delhi</span>
                <span>📞 +91 88821 23089</span>
                <span>⏰ Mon - Sun: 10:00 AM - 8:00 PM</span>
            </div>
            <div class="nav-top-socials">
                <a href="https://instagram.com" target="_blank" style="margin-left: 10px;">Instagram</a>
                <a href="https://facebook.com" target="_blank" style="margin-left: 10px;">Facebook</a>
                <a href="https://wa.me/918882123089" target="_blank" style="margin-left: 10px;">WhatsApp</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <div class="brand-name">behold<span>Beauty</span></div>
                <div class="brand-sub">Luxury Studio & Bridal Lounge</div>
            </a>

            <button class="mobile-nav-toggle" id="mobileNavToggle" aria-label="Toggle navigation">
                ☰
            </button>

            <ul class="nav-links" id="navLinks">
                <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <!-- <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li> -->
                <li><a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">Services</a></li>
                <li><a href="{{ route('bridal-makeup') }}" class="nav-link {{ request()->routeIs('bridal-makeup') ? 'active' : '' }}">Bridal Makeup</a></li>
                <li><a href="{{ route('artist') }}" class="nav-link {{ request()->routeIs('artist') ? 'active' : '' }}">Makeup Artist</a></li>
                <li><a href="{{ route('bridal-packages') }}" class="nav-link {{ request()->routeIs('bridal-packages') ? 'active' : '' }}">Bridal Packages</a></li>
                <li><a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
                <li><a href="{{ route('pricing') }}" class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}">Pricing</a></li>
                <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a></li>
            </ul>

            <div class="nav-cta">
                <a href="{{ route('booking.create') }}" class="btn btn-gold">
                    <span>✨ Book Appointment</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main View Content -->
    <main>
        @yield('content')
    </main>

    <!-- Lightbox Modal -->
    <div class="lightbox-modal" id="lightboxModal">
        <span class="lightbox-close" id="lightboxClose">&times;</span>
        <div class="lightbox-content">
            <img src="" id="lightboxImg" alt="Enlarged view">
        </div>
    </div>

    <!-- Sticky Mobile Bottom Bar -->
    <div class="mobile-sticky-bar">
        <div class="bar-grid">
            <a href="https://wa.me/918882123089?text=Hi%20beholdBeauty!%20I%20would%20like%20to%20inquire%20about%20booking%20an%20appointment." target="_blank" class="btn btn-dark" style="padding: 0.6rem; font-size: 0.85rem;">
                💬 WhatsApp
            </a>
            <a href="{{ route('booking.create') }}" class="btn btn-gold" style="padding: 0.6rem; font-size: 0.85rem;">
                ✨ Book Now
            </a>
        </div>
    </div>

    <!-- Luxury Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="brand-name">behold<span>Beauty</span></div>
                    <p>India's premier luxury beauty studio & bridal lounge. Crafting unforgettable bridal makeovers, glow facials, precision haircutting, and high-fashion styling with gold-standard elegance.</p>
                    <div style="display: flex; gap: 1rem; font-size: 1.2rem;">
                        <a href="#" style="color: var(--gold-primary);">📸 Instagram</a>
                        <a href="#" style="color: var(--gold-primary);">📘 Facebook</a>
                        <a href="#" style="color: var(--gold-primary);">💬 WhatsApp</a>
                    </div>
                </div>

                <div>
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('artist') }}">Meet the Artist</a></li>
                        <li><a href="{{ route('bridal-makeup') }}">Bridal Makeup</a></li>
                        <li><a href="{{ route('gallery') }}">Photo Gallery</a></li>
                        <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                        <li><a href="{{ route('pricing') }}">Pricing Menu</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-heading">Beauty Services</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('services.index') }}">HD & Airbrush Bridal</a></li>
                        <li><a href="{{ route('services.index') }}">Keratin & Hair Spa</a></li>
                        <li><a href="{{ route('services.index') }}">24K Gold & Diamond Facial</a></li>
                        <li><a href="{{ route('services.index') }}">Gel Nails & Designer Art</a></li>
                        <li><a href="{{ route('services.index') }}">Full Body Rica Waxing</a></li>
                        <li><a href="{{ route('bridal-packages') }}">Pre-Bridal Rituals</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-heading">Visit Studio</h4>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 0.8rem;">📍 104 Luxury Square, Studio #4, MG Road, New Delhi 110001</p>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 0.8rem;">📞 Call Us: +91 88821 23089</p>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 0.8rem;">✉️ Email: info@beholdbeauty.com</p>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">⏰ Studio Hours: 10:00 AM - 8:00 PM (All 7 Days)</p>
                </div>
            </div>

            <div class="footer-bottom">
                <div>&copy; {{ date('Y') }} beholdBeauty Studio. All Rights Reserved.</div>
                <div>Crafted with Gold Elegance & Precision for Royalty.</div>
            </div>
        </div>
    </footer>

    <!-- App JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('extra_js')
</body>
</html>
