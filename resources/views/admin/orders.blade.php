@extends('layouts.admin')

@section('title', 'Orders Management')

@section('content')

<div class="p-6">
    <!-- Page Header -->
    <div class="bg-white rounded-xl shadow p-6">
        <h1 class="text-xl font-semibold text-orange-600">Orders</h1>
        <p class="text-gray-500 text-sm">Manage and track all customer orders</p>

        <!-- Filters -->
        <div class="mt-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center gap-3">
                <input type="date" class="border rounded-lg px-3 py-2 text-sm text-gray-600 focus:ring-2 focus:ring-orange-400">
                <input type="date" class="border rounded-lg px-3 py-2 text-sm text-gray-600 focus:ring-2 focus:ring-orange-400">
                <select class="border rounded-lg px-3 py-2 text-sm text-gray-600 focus:ring-2 focus:ring-orange-400">
                    <option>All Statuses</option>
                    <option>Processing</option>
                    <option>Shipped</option>
                    <option>Completed</option>
                    <option>Cancelled</option>
                </select>
            </div>

            <!-- Search -->
            <div>
                <input type="text" placeholder="Search orders..." 
                    class="border rounded-full px-4 py-2 text-sm w-64 focus:ring-2 focus:ring-orange-400">
            </div>
        </div>

        <!-- Orders Table -->
        <div class="mt-6 overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="text-left text-gray-600 text-sm border-b">
                        <th class="py-3 px-4">Order ID</th>
                        <th class="py-3 px-4">Customer Name</th>
                        <th class="py-3 px-4">Order Date</th>
                        <th class="py-3 px-4">Total Amount</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach ($orders as $order)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-orange-600 font-medium">#{{ $order->order_id }}</td>
                        <td class="py-3 px-4">{{ $order->customer_name }}</td>
                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse($order->order_date)->format('F j, Y') }}</td>
                        <td class="py-3 px-4">INR {{ number_format($order->total_amount, 0, '.', ',') }}</td>
                        <td class="py-3 px-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium 
                                {{ $order->status == 'Processing' ? 'bg-yellow-400 text-white' : '' }}
                                {{ $order->status == 'Completed' ? 'bg-green-500 text-white' : '' }}
                                {{ $order->status == 'Cancelled' ? 'bg-red-500 text-white' : '' }}
                                {{ $order->status == 'Shipped' ? 'bg-blue-500 text-white' : '' }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <a href="{{ route('orders.show', $order->id) }}" 
                               class="bg-orange-500 hover:bg-orange-600 text-white text-xs px-4 py-2 rounded-full">
                                View Details
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex items-center justify-between text-sm text-gray-600">
            <p>Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} entries</p>
            <div class="flex items-center space-x-2">
                {{ $orders->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>
@endsection

