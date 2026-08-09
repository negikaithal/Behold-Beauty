@extends('layouts.app')

@section('title', 'Book Appointment | beholdBeauty')

@section('content')
<section style="padding: 4rem 0 2rem 0; background: var(--bg-secondary); text-align: center;">
    <div class="container">
        <span class="section-tag">Instant Online Reservation</span>
        <h1 class="section-heading" style="font-size: 3.5rem;">Book Your Appointment</h1>
        <p class="section-subheading">Select your preferred date, time, and service package for a royal makeover experience.</p>
    </div>
</section>

<section style="padding: 4rem 0;">
    <div class="container">
        <div class="booking-card">

            @if(session('success'))
            <div style="background: #D4EDDA; color: #155724; padding: 1.25rem; border-radius: var(--radius-md); margin-bottom: 2rem; border: 1px solid #C3E6CB;">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div style="background: #F8D7DA; color: #721C24; padding: 1.25rem; border-radius: var(--radius-md); margin-bottom: 2rem; border: 1px solid #F5C6CB;">
                <strong style="display: block; margin-bottom: 0.5rem;">Please fix the following issues:</strong>
                <ul style="margin-left: 1.5rem;">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('booking.store') }}" method="POST">
                @csrf

                <div class="form-grid">
                    <!-- Customer Name -->
                    <div class="form-group">
                        <label class="form-label" for="customer_name">Full Name *</label>
                        <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Enter your name" value="{{ old('customer_name') }}" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="+91 88821 23089" value="{{ old('phone') }}" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group full-width">
                        <label class="form-label" for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="yourname@example.com" value="{{ old('email') }}" required>
                    </div>

                    <!-- Service Category -->
                    <div class="form-group">
                        <label class="form-label" for="service_category">Service Category *</label>
                        <select id="service_category" name="service_category" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('service_category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Specific Service (Dynamic) -->
                    <div class="form-group">
                        <label class="form-label" for="specific_service">Specific Service / Package *</label>
                        <select id="specific_service" name="specific_service" class="form-control" required>
                            <option value="">-- Select Category First --</option>
                            @if(old('specific_service'))
                            <option value="{{ old('specific_service') }}" selected>{{ old('specific_service') }}</option>
                            @endif
                        </select>
                    </div>

                    <!-- Preferred Date -->
                    <div class="form-group">
                        <label class="form-label" for="preferred_date">Preferred Date *</label>
                        <input type="date" id="preferred_date" name="preferred_date" class="form-control" min="{{ date('Y-m-d') }}" value="{{ old('preferred_date', date('Y-m-d')) }}" required>
                    </div>

                    <!-- Preferred Time -->
                    <div class="form-group">
                        <label class="form-label" for="preferred_time">Preferred Time Slot *</label>
                        <select id="preferred_time" name="preferred_time" class="form-control" required>
                            <option value="10:00 AM" {{ old('preferred_time') == '10:00 AM' ? 'selected' : '' }}>10:00 AM - Morning Slot</option>
                            <option value="11:30 AM" {{ old('preferred_time') == '11:30 AM' ? 'selected' : '' }}>11:30 AM - Morning Slot</option>
                            <option value="01:00 PM" {{ old('preferred_time') == '01:00 PM' ? 'selected' : '' }}>01:00 PM - Afternoon Slot</option>
                            <option value="02:30 PM" {{ old('preferred_time') == '02:30 PM' ? 'selected' : '' }}>02:30 PM - Afternoon Slot</option>
                            <option value="04:00 PM" {{ old('preferred_time') == '04:00 PM' ? 'selected' : '' }}>04:00 PM - Evening Slot</option>
                            <option value="05:30 PM" {{ old('preferred_time') == '05:30 PM' ? 'selected' : '' }}>05:30 PM - Evening Slot</option>
                            <option value="07:00 PM" {{ old('preferred_time') == '07:00 PM' ? 'selected' : '' }}>07:00 PM - Evening Slot</option>
                        </select>
                    </div>

                    <!-- Number of People -->
                    <div class="form-group full-width">
                        <label class="form-label" for="number_of_people">Number of People *</label>
                        <input type="number" id="number_of_people" name="number_of_people" class="form-control" min="1" max="20" value="{{ old('number_of_people', 1) }}" required>
                    </div>

                    <!-- Message / Special Request -->
                    <div class="form-group full-width">
                        <label class="form-label" for="message">Message / Special Request (Optional)</label>
                        <textarea id="message" name="message" class="form-control" placeholder="Mention skin allergies, venue location for bridal makeup, or specific styling preferences...">{{ old('message') }}</textarea>
                    </div>
                </div>

                <div style="margin-top: 2.5rem; text-align: center;">
                    <button type="submit" class="btn btn-gold" style="font-size: 1.1rem; padding: 1rem 3rem; width: 100%;">
                        ✨ Confirm & Reserve Appointment
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('extra_js')
<script>
    window.beholdServicesData = @json($servicesGrouped);
    window.beholdBridalPackagesData = @json($bridalPackages);

    @if(isset($selectedService))
    document.addEventListener('DOMContentLoaded', () => {
        // Find matching category
        const targetSrv = "{{ $selectedService }}";
        const catSelect = document.getElementById('service_category');
        const srvSelect = document.getElementById('specific_service');

        for (const [catName, list] of Object.entries(window.beholdServicesData)) {
            if (list.some(s => s.name === targetSrv)) {
                catSelect.value = catName;
                catSelect.dispatchEvent(new Event('change'));
                srvSelect.value = targetSrv;
                break;
            }
        }

        if (window.beholdBridalPackagesData.some(p => p.name === targetSrv)) {
            catSelect.value = 'Bridal Package';
            catSelect.dispatchEvent(new Event('change'));
            srvSelect.value = targetSrv;
        }
    });
    @endif
</script>
@endsection
