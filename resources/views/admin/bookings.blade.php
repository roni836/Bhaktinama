@extends('layouts.admin')

@section('title', 'Booking Management')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Recent Booking Requests</h1>
            <p class="text-gray-600">Manage all booking requests from users</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-2">
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <button type="button" class="px-4 py-2 text-sm font-medium text-orange-500 bg-white border border-orange-500 rounded-l-lg hover:bg-orange-50 focus:z-10 focus:ring-2 focus:ring-orange-500 focus:text-orange-600">
                    All Bookings
                </button>
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-r border-gray-300 hover:bg-gray-100 hover:text-orange-500 focus:z-10 focus:ring-2 focus:ring-orange-500 focus:text-orange-600">
                    Pandit Bookings
                </button>
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-l-0 border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-orange-500 focus:z-10 focus:ring-2 focus:ring-orange-500 focus:text-orange-600">
                    Temple Bookings
                </button>
            </div>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Booking Item 1 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-medium">SM</div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Suresh Mehta</div>
                                <div class="text-sm text-gray-500">suresh.m@gmail.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Temple Puja</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">July 5, 2025</div>
                        <div class="text-sm text-gray-500">09:30 AM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">INR 4,500</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-orange-500 hover:text-orange-600">View Details</a>
                    </td>
                </tr>

                <!-- Booking Item 2 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://placehold.co/80x80/FFDDC1/FF7B00?text=AP" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Ananya Patel</div>
                                <div class="text-sm text-gray-500">eBaw9wanika@hotmail.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Pandit Booking</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">July 3, 2025</div>
                        <div class="text-sm text-gray-500">06:30 PM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">INR 4,500</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-orange-500 hover:text-orange-600">View Details</a>
                    </td>
                </tr>

                <!-- More booking items... -->
                <!-- Copy and modify the above rows for more bookings -->
            </tbody>
        </table>
        
        <!-- Pagination -->
        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">42</span> entries
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left h-5 w-5"></i>
                        </a>
                        <a href="#" aria-current="page" class="z-10 bg-orange-50 border-orange-500 text-orange-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right h-5 w-5"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection