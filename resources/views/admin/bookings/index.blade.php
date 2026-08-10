@extends('layouts.app')

@section('title', 'Admin Bookings Management | Behold Beauty Makeup Studio')

@section('content')
<section style="padding: 3rem 0; background: var(--bg-secondary);">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <div>
                <span class="section-tag">Studio Management</span>
                <h1 class="section-heading" style="font-size: 2.8rem; margin-bottom: 0.5rem;">Appointment Bookings</h1>
                <p style="color: var(--text-secondary);">Manage, review, and confirm customer reservations submitted to Behold Beauty Makeup Studio.</p>
            </div>
            <div>
                <a href="{{ route('booking.create') }}" class="btn btn-gold" target="_blank">
                    ✨ Create New Booking
                </a>
            </div>
        </div>
    </div>
</section>

<section style="padding: 3rem 0;">
    <div class="container">

        @if(session('success'))
        <div style="background: #D4EDDA; color: #155724; padding: 1rem 1.25rem; border-radius: var(--radius-md); margin-bottom: 2rem; border: 1px solid #C3E6CB;">
            ✓ {{ session('success') }}
        </div>
        @endif

        <!-- Summary Metric Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
            <div style="background: var(--bg-card); padding: 1.5rem; border-radius: var(--radius-md); border: 1px solid var(--rose-border); box-shadow: var(--shadow-sm);">
                <span style="font-size: 0.85rem; color: var(--text-muted); text-transform: uppercase; font-weight: 600; letter-spacing: 1px;">Total Bookings</span>
                <div style="font-family: var(--font-heading); font-size: 2.4rem; font-weight: 700; color: var(--text-primary); margin-top: 0.3rem;">{{ $stats['total'] }}</div>
            </div>
            <div style="background: var(--bg-card); padding: 1.5rem; border-radius: var(--radius-md); border-left: 4px solid #D97706; border-top: 1px solid var(--rose-border); border-right: 1px solid var(--rose-border); border-bottom: 1px solid var(--rose-border); box-shadow: var(--shadow-sm);">
                <span style="font-size: 0.85rem; color: #D97706; text-transform: uppercase; font-weight: 600; letter-spacing: 1px;">Pending Action</span>
                <div style="font-family: var(--font-heading); font-size: 2.4rem; font-weight: 700; color: #D97706; margin-top: 0.3rem;">{{ $stats['pending'] }}</div>
            </div>
            <div style="background: var(--bg-card); padding: 1.5rem; border-radius: var(--radius-md); border-left: 4px solid #059669; border-top: 1px solid var(--rose-border); border-right: 1px solid var(--rose-border); border-bottom: 1px solid var(--rose-border); box-shadow: var(--shadow-sm);">
                <span style="font-size: 0.85rem; color: #059669; text-transform: uppercase; font-weight: 600; letter-spacing: 1px;">Confirmed</span>
                <div style="font-family: var(--font-heading); font-size: 2.4rem; font-weight: 700; color: #059669; margin-top: 0.3rem;">{{ $stats['confirmed'] }}</div>
            </div>
            <div style="background: var(--bg-card); padding: 1.5rem; border-radius: var(--radius-md); border-left: 4px solid #2563EB; border-top: 1px solid var(--rose-border); border-right: 1px solid var(--rose-border); border-bottom: 1px solid var(--rose-border); box-shadow: var(--shadow-sm);">
                <span style="font-size: 0.85rem; color: #2563EB; text-transform: uppercase; font-weight: 600; letter-spacing: 1px;">Completed</span>
                <div style="font-family: var(--font-heading); font-size: 2.4rem; font-weight: 700; color: #2563EB; margin-top: 0.3rem;">{{ $stats['completed'] }}</div>
            </div>
            <div style="background: var(--bg-card); padding: 1.5rem; border-radius: var(--radius-md); border-left: 4px solid #DC2626; border-top: 1px solid var(--rose-border); border-right: 1px solid var(--rose-border); border-bottom: 1px solid var(--rose-border); box-shadow: var(--shadow-sm);">
                <span style="font-size: 0.85rem; color: #DC2626; text-transform: uppercase; font-weight: 600; letter-spacing: 1px;">Cancelled</span>
                <div style="font-family: var(--font-heading); font-size: 2.4rem; font-weight: 700; color: #DC2626; margin-top: 0.3rem;">{{ $stats['cancelled'] }}</div>
            </div>
        </div>

        <!-- Filter & Search Controls -->
        <div style="background: var(--bg-card); padding: 1.5rem; border-radius: var(--radius-md); border: 1px solid var(--rose-border); margin-bottom: 2rem;">
            <form action="{{ route('admin.bookings.index') }}" method="GET" style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center; justify-content: space-between;">
                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                    <a href="{{ route('admin.bookings.index') }}" class="btn {{ !request('status') || request('status') === 'all' ? 'btn-gold' : 'btn-dark' }}" style="padding: 0.5rem 1rem; font-size: 0.85rem;">
                        All ({{ $stats['total'] }})
                    </a>
                    <a href="{{ route('admin.bookings.index', ['status' => 'Pending', 'search' => request('search')]) }}" class="btn {{ request('status') === 'Pending' ? 'btn-gold' : 'btn-dark' }}" style="padding: 0.5rem 1rem; font-size: 0.85rem;">
                        Pending ({{ $stats['pending'] }})
                    </a>
                    <a href="{{ route('admin.bookings.index', ['status' => 'Confirmed', 'search' => request('search')]) }}" class="btn {{ request('status') === 'Confirmed' ? 'btn-gold' : 'btn-dark' }}" style="padding: 0.5rem 1rem; font-size: 0.85rem;">
                        Confirmed ({{ $stats['confirmed'] }})
                    </a>
                    <a href="{{ route('admin.bookings.index', ['status' => 'Completed', 'search' => request('search')]) }}" class="btn {{ request('status') === 'Completed' ? 'btn-gold' : 'btn-dark' }}" style="padding: 0.5rem 1rem; font-size: 0.85rem;">
                        Completed ({{ $stats['completed'] }})
                    </a>
                    <a href="{{ route('admin.bookings.index', ['status' => 'Cancelled', 'search' => request('search')]) }}" class="btn {{ request('status') === 'Cancelled' ? 'btn-gold' : 'btn-dark' }}" style="padding: 0.5rem 1rem; font-size: 0.85rem;">
                        Cancelled ({{ $stats['cancelled'] }})
                    </a>
                </div>

                <div style="display: flex; gap: 0.5rem; flex-grow: 1; max-width: 400px;">
                    @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                    @endif
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, phone, ref..." class="form-control" style="font-size: 0.9rem; padding: 0.5rem 0.85rem; border: 1px solid var(--rose-border); border-radius: var(--radius-sm); width: 100%;">
                    <button type="submit" class="btn btn-gold" style="padding: 0.5rem 1.25rem; font-size: 0.85rem; white-space: nowrap;">
                        🔍 Search
                    </button>
                    @if(request('search'))
                    <a href="{{ route('admin.bookings.index', ['status' => request('status')]) }}" class="btn btn-dark" style="padding: 0.5rem 0.85rem; font-size: 0.85rem;">
                        ✕ Clear
                    </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Bookings Table -->
        <div style="background: var(--bg-card); border-radius: var(--radius-md); border: 1px solid var(--rose-border); overflow-x: auto; box-shadow: var(--shadow-sm);">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.9rem;">
                <thead>
                    <tr style="background: var(--bg-secondary); border-bottom: 2px solid var(--rose-border);">
                        <th style="padding: 1rem; font-weight: 700;">Ref No. & Date</th>
                        <th style="padding: 1rem; font-weight: 700;">Client Info</th>
                        <th style="padding: 1rem; font-weight: 700;">Service Requested</th>
                        <th style="padding: 1rem; font-weight: 700;">Appt Date & Time</th>
                        <th style="padding: 1rem; font-weight: 700;">Guests</th>
                        <th style="padding: 1rem; font-weight: 700;">Status</th>
                        <th style="padding: 1rem; font-weight: 700; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr style="border-bottom: 1px solid var(--rose-border); vertical-align: top;">
                        <td style="padding: 1rem;">
                            <strong style="color: var(--gold-primary); font-family: var(--font-heading); font-size: 1.05rem;">{{ $booking->booking_number }}</strong>
                            <span style="display: block; font-size: 0.75rem; color: var(--text-muted); margin-top: 0.2rem;">Submitted: {{ $booking->created_at->format('M d, Y h:i A') }}</span>
                        </td>
                        <td style="padding: 1rem;">
                            <strong style="display: block; font-size: 0.95rem;">{{ $booking->customer_name }}</strong>
                            <span style="display: block; color: var(--text-secondary); font-size: 0.85rem;">📞 {{ $booking->phone }}</span>
                            <span style="display: block; color: var(--text-muted); font-size: 0.8rem;">✉️ {{ $booking->email }}</span>
                        </td>
                        <td style="padding: 1rem;">
                            <span style="font-size: 0.75rem; background: var(--bg-secondary); padding: 0.2rem 0.5rem; border-radius: 4px; color: var(--gold-primary); font-weight: 600; display: inline-block; margin-bottom: 0.3rem;">{{ $booking->service_category }}</span>
                            <strong style="display: block; font-size: 0.95rem;">{{ $booking->specific_service }}</strong>
                            @if($booking->message)
                            <p style="font-size: 0.8rem; color: var(--text-muted); font-style: italic; margin-top: 0.4rem; max-width: 250px;">"{{ $booking->message }}"</p>
                            @endif
                        </td>
                        <td style="padding: 1rem;">
                            <strong>📅 {{ $booking->preferred_date->format('M d, Y') }}</strong>
                            <span style="display: block; color: var(--text-secondary); font-size: 0.85rem;">⏰ {{ $booking->preferred_time }}</span>
                        </td>
                        <td style="padding: 1rem; font-weight: 600;">
                            👥 {{ $booking->number_of_people }} Person(s)
                        </td>
                        <td style="padding: 1rem;">
                            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" style="font-size: 0.8rem; font-weight: 600; padding: 0.4rem 0.6rem; border-radius: 6px; border: 1px solid #CCC; cursor: pointer;
                                    @if($booking->status === 'Pending') background: #FEF3C7; color: #92400E;
                                    @elseif($booking->status === 'Confirmed') background: #D1FAE5; color: #065F46;
                                    @elseif($booking->status === 'Completed') background: #DBEAFE; color: #1E40AF;
                                    @else background: #FEE2E2; color: #991B1B; @endif">
                                    <option value="Pending" {{ $booking->status === 'Pending' ? 'selected' : '' }}>⏳ Pending</option>
                                    <option value="Confirmed" {{ $booking->status === 'Confirmed' ? 'selected' : '' }}>✓ Confirmed</option>
                                    <option value="Completed" {{ $booking->status === 'Completed' ? 'selected' : '' }}>✨ Completed</option>
                                    <option value="Cancelled" {{ $booking->status === 'Cancelled' ? 'selected' : '' }}>✕ Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td style="padding: 1rem; text-align: right;">
                            <div style="display: flex; gap: 0.4rem; justify-content: flex-end;">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->phone) }}?text=Hi%20{{ urlencode($booking->customer_name) }}!%20Regarding%20your%20booking%20ref%20{{ $booking->booking_number }}%20at%20Behold%20Beauty%20Makeup%20Studio..." target="_blank" class="btn btn-gold" style="padding: 0.35rem 0.65rem; font-size: 0.75rem;" title="Chat on WhatsApp">
                                    💬 WhatsApp
                                </a>
                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete booking #{{ $booking->booking_number }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark" style="padding: 0.35rem 0.65rem; font-size: 0.75rem; background: #DC2626; border-color: #DC2626; color: #FFF;" title="Delete Booking">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="padding: 3rem 1rem; text-align: center; color: var(--text-muted);">
                            <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">📅</div>
                            No bookings found matching your search criteria.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($bookings->hasPages())
        <div style="margin-top: 2rem;">
            {{ $bookings->appends(request()->query())->links() }}
        </div>
        @endif

    </div>
</section>
@endsection
