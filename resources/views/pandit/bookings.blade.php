@extends('layouts.pandit')

@section('title', 'Bookings')

@section('header', 'My Bookings')

@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-900">All Bookings</h2>
            <div class="flex space-x-2">
                <select id="status-filter" class="rounded-md border-gray-300 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50">
                    <option value="all">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ceremony</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($bookings as $booking)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $booking->ceremony_type }}</div>
                            @if($booking->special_requests)
                            <div class="text-xs text-gray-500 truncate max-w-xs" title="{{ $booking->special_requests }}">{{ Str::limit($booking->special_requests, 30) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $booking->ceremony_date->format('M d, Y') }}</div>
                            <div class="text-sm text-gray-500">{{ $booking->ceremony_date->format('h:i A') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 truncate max-w-xs" title="{{ $booking->location }}">{{ Str::limit($booking->location, 30) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $booking->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $booking->status == 'completed' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $booking->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                            ">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">₹{{ $booking->amount }}</div>
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $booking->payment_status == 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}
                            ">
                                {{ ucfirst($booking->payment_status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-orange-500 hover:text-orange-700">View Details</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No bookings found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $bookings->links() }}
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.getElementById('status-filter').addEventListener('change', function() {
        const status = this.value;
        window.location.href = `{{ route('pandit.bookings') }}?status=${status}`;
    });
</script>
@endsection