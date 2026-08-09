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
                            <p style="color: var(--text-secondary);">104 Luxury Square, Studio #4, MG Road, New Delhi 110001</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 1.25rem; align-items: flex-start;">
                        <div style="font-size: 1.8rem; color: var(--gold-primary);">📞</div>
                        <div>
                            <strong style="display: block; font-size: 1.1rem;">Phone & WhatsApp</strong>
                            <p style="color: var(--text-secondary);">+91 88821 23089</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 1.25rem; align-items: flex-start;">
                        <div style="font-size: 1.8rem; color: var(--gold-primary);">✉️</div>
                        <div>
                            <strong style="display: block; font-size: 1.1rem;">Email Enquiries</strong>
                            <p style="color: var(--text-secondary);">bookings@beholdbeauty.com</p>
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

                <!-- Google Maps iFrame -->
                <div style="border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--rose-border); box-shadow: var(--shadow-soft); height: 280px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.562017260538!2d77.2177!3d28.6139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjjCsDM2JzUwLjAiTiA3N8KwMTMnMDMuNyJF!5e0!3m2!1sen!2sin!4v1620000000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
