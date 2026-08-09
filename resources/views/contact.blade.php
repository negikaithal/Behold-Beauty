@extends('layouts.app')

@section('title', 'Contact Us & Location | beholdBeauty Studio')

@section('content')
<section style="padding: 4rem 0 2rem 0; background: var(--bg-secondary); text-align: center;">
    <div class="container">
        <span class="section-tag">Get In Touch</span>
        <h1 class="section-heading" style="font-size: 3.5rem;">Visit Our Salon Studio</h1>
        <p class="section-subheading">Located in the heart of the city with dedicated valet parking and private bridal suites.</p>
    </div>
</section>

<section style="padding: 5rem 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem;">
            <div>
                <h2 style="font-size: 2.2rem; margin-bottom: 1.5rem;">Studio Details</h2>

                <div style="display: flex; flex-direction: column; gap: 1.75rem; margin-bottom: 3rem;">
                    <div style="display: flex; gap: 1.25rem; align-items: flex-start;">
                        <div style="font-size: 1.8rem; color: var(--gold-primary);">📍</div>
                        <div>
                            <strong style="display: block; font-size: 1.1rem;">Studio Address</strong>
                            <p style="color: var(--text-secondary);">926, Block H, RZH, Raj Nagar II Extension, Palam, Delhi</p>
                            <a href="https://maps.app.goo.gl/6YVHd8qf6zK62TAy8" target="_blank" style="color: var(--gold-primary); font-weight: 600; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.3rem; margin-top: 0.4rem;">
                                📍 Open Location on Google Maps ↗
                            </a>
                        </div>
                    </div>

                    <div style="display: flex; gap: 1.25rem; align-items: flex-start;">
                        <div style="font-size: 1.8rem; color: var(--gold-primary);">📞</div>
                        <div>
                            <strong style="display: block; font-size: 1.1rem;">Phone & WhatsApp</strong>
                            <p style="color: var(--text-secondary);">+91 88821 23089</p>
                            <a href="https://wa.me/918882123089?text=Hi%20beholdBeauty!%20I%20would%20like%20to%20inquire%20about%20booking%20an%20appointment." target="_blank" style="color: var(--gold-primary); font-weight: 600; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.3rem; margin-top: 0.4rem;">
                                💬 Chat on WhatsApp ↗
                            </a>
                        </div>
                    </div>

                    <div style="display: flex; gap: 1.25rem; align-items: flex-start;">
                        <div style="font-size: 1.8rem; color: var(--gold-primary);">✉️</div>
                        <div>
                            <strong style="display: block; font-size: 1.1rem;">Email Enquiries</strong>
                            <p style="color: var(--text-secondary);"><a href="mailto:nagarshalu730@gmail.com" style="color: inherit;">nagarshalu730@gmail.com</a></p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 1.25rem; align-items: flex-start;">
                        <div style="font-size: 1.8rem; color: var(--gold-primary);">⏰</div>
                        <div>
                            <strong style="display: block; font-size: 1.1rem;">Business Hours</strong>
                            <p style="color: var(--text-secondary);">Monday - Sunday: 10:00 AM - 8:00 PM</p>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Container -->
                <div style="border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--rose-border); box-shadow: var(--shadow-soft); position: relative;">
                    <iframe src="https://maps.google.com/maps?q=926,%20Block%20H,%20RZH,%20Raj%20Nagar%20II%20Extension,%20Palam,%20Delhi&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="280" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div style="padding: 0.75rem 1rem; background: var(--rose-light); text-align: center; border-top: 1px solid var(--rose-border);">
                        <a href="https://maps.app.goo.gl/6YVHd8qf6zK62TAy8" target="_blank" class="btn btn-gold" style="font-size: 0.85rem; padding: 0.5rem 1.5rem;">
                            🗺️ Get Directions on Google Maps
                        </a>
                    </div>
                </div>
            </div>

            <div>
                <div style="background: var(--bg-card); padding: 2.5rem; border-radius: var(--radius-lg); border: 1px solid var(--rose-border); box-shadow: var(--shadow-soft);">
                    <h3 style="font-size: 1.8rem; margin-bottom: 0.5rem;">Send Us a Message</h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 2rem;">Have a question about bridal trials or customized packages? Write to us.</p>

                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                            <div class="form-group">
                                <label class="form-label">Your Full Name</label>
                                <input type="text" name="customer_name" class="form-control" placeholder="e.g. Ananya Sharma" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" placeholder="+91 88821 23089" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="ananya@example.com" required>
                            </div>

                            <input type="hidden" name="service_category" value="Contact Inquiry">
                            <input type="hidden" name="specific_service" value="General Inquiry">
                            <input type="hidden" name="preferred_date" value="{{ date('Y-m-d') }}">
                            <input type="hidden" name="preferred_time" value="10:00 AM">
                            <input type="hidden" name="number_of_people" value="1">

                            <div class="form-group">
                                <label class="form-label">Your Message or Inquiry</label>
                                <textarea name="message" class="form-control" placeholder="Tell us about your event date, required services..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-gold" style="width: 100%; margin-top: 1rem;">
                                Send Message ✨
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
