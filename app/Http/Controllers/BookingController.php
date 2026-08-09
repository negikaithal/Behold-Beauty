<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\BridalPackage;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $categories = [
            'Bridal Makeup',
            'Bridal Package',
            'Hair Services',
            'Facial & Skin Care',
            'Threading',
            'Waxing',
            'Manicure & Pedicure',
            'Party & Occasion Makeup',
            'Special Makeup',
            'Pre-Bridal Services',
            'Additional Services'
        ];

        $servicesGrouped = Service::all()->groupBy('category');
        $bridalPackages = BridalPackage::all();
        $selectedService = $request->query('service');

        return view('booking.create', compact('categories', 'servicesGrouped', 'bridalPackages', 'selectedService'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'service_category' => 'required|string',
            'specific_service' => 'required|string',
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'required|string',
            'number_of_people' => 'required|integer|min:1|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        $bookingNumber = 'BB-' . strtoupper(uniqid());

        $booking = Booking::create([
            'booking_number' => $bookingNumber,
            'customer_name' => $validated['customer_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'service_category' => $validated['service_category'],
            'specific_service' => $validated['specific_service'],
            'preferred_date' => $validated['preferred_date'],
            'preferred_time' => $validated['preferred_time'],
            'number_of_people' => $validated['number_of_people'],
            'message' => $validated['message'] ?? null,
            'status' => 'Pending',
        ]);

        return redirect()->route('booking.confirmation', ['booking_number' => $booking->booking_number])
            ->with('success', 'Your appointment request has been submitted successfully!');
    }

    public function confirmation($bookingNumber)
    {
        $booking = Booking::where('booking_number', $bookingNumber)->firstOrFail();
        return view('booking.confirmation', compact('booking'));
    }
}
