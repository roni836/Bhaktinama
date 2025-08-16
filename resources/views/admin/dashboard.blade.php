@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-gray-600">Welcome to MyPoojaPandit Admin Panel</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Temples Card -->
        <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Temples</p>
                <p class="text-2xl font-bold text-gray-900">128</p>
                <p class="text-xs text-green-600 flex items-center mt-1">
                    <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                </p>
            </div>
            <div class="bg-indigo-100 p-3 rounded-full">
                <i class="fas fa-gopuram text-indigo-500 text-xl"></i>
            </div>
        </div>

        <!-- Active Pandits Card -->
        <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Active Pandits</p>
                <p class="text-2xl font-bold text-gray-900">247</p>
                <p class="text-xs text-green-600 flex items-center mt-1">
                    <i class="fas fa-arrow-up mr-1"></i> 8% from last month
                </p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <i class="fas fa-user-tie text-blue-500 text-xl"></i>
            </div>
        </div>

        <!-- Shop Items Card -->
        <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Shop Items</p>
                <p class="text-2xl font-bold text-gray-900">583</p>
                <p class="text-xs text-green-600 flex items-center mt-1">
                    <i class="fas fa-arrow-up mr-1"></i> 15% from last month
                </p>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
                <i class="fas fa-shopping-basket text-yellow-500 text-xl"></i>
            </div>
        </div>

        <!-- Pending Bookings Card -->
        <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Pending Bookings</p>
                <p class="text-2xl font-bold text-gray-900">42</p>
                <p class="text-xs text-green-600 flex items-center mt-1">
                    <i class="fas fa-arrow-up mr-1"></i> 6% from yesterday
                </p>
            </div>
            <div class="bg-red-100 p-3 rounded-full">
                <i class="fas fa-calendar-check text-red-500 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Activities -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Recent Activities</h2>
            </div>
            <div class="divide-y divide-gray-200">
                <!-- Activity Item 1 -->
                <div class="px-6 py-4 flex items-start space-x-4">
                    <div class="bg-blue-100 p-2 rounded-full">
                        <i class="fas fa-user-tie text-blue-500"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-medium">New Pandit Registration</h3>
                        <p class="text-sm text-gray-600">Pandit Vikram Sharma from Delhi registered on the platform.</p>
                        <p class="text-xs text-gray-500 mt-1">25 min ago</p>
                    </div>
                </div>
                
                <!-- Activity Item 2 -->
                <div class="px-6 py-4 flex items-start space-x-4">
                    <div class="bg-green-100 p-2 rounded-full">
                        <i class="fas fa-shopping-cart text-green-500"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-medium">New Order Placed</h3>
                        <p class="text-sm text-gray-600">Ananya Patel ordered Diwali Puja Kit. INR 2,450.</p>
                        <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
                    </div>
                </div>
                
                <!-- Activity Item 3 -->
                <div class="px-6 py-4 flex items-start space-x-4">
                    <div class="bg-yellow-100 p-2 rounded-full">
                        <i class="fas fa-calendar-alt text-yellow-500"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-medium">Temple Booking Request</h3>
                        <p class="text-sm text-gray-600">Suresh Mehta requested Ganesh Puja at Siddhivinayak Temple.</p>
                        <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                    </div>
                </div>
                
                <!-- Activity Item 4 -->
                <div class="px-6 py-4 flex items-start space-x-4">
                    <div class="bg-indigo-100 p-2 rounded-full">
                        <i class="fas fa-gopuram text-indigo-500"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-medium">New Temple Added</h3>
                        <p class="text-sm text-gray-600">Shri Jagannath Temple in Puri was added to the platform.</p>
                        <p class="text-xs text-gray-500 mt-1">5 hours ago</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Quick Actions</h2>
            </div>
            <div class="p-6 space-y-4">
                <a href="{{ route('admin.pandits') }} " class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-300">
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-100 p-2 rounded-full">
                            <i class="fas fa-user-tie text-blue-500"></i>
                        </div>
                        <span class="font-medium">Add New Pandit</span>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </a>
                
                <a href="{{ route('admin.temples') }} " class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-300">
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-100 p-2 rounded-full">
                            <i class="fas fa-gopuram text-indigo-500"></i>
                        </div>
                        <span class="font-medium">Add New Temple</span>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </a>
                
                <a href="{{ route('admin.products') }} " class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-300">
                    <div class="flex items-center space-x-3">
                        <div class="bg-green-100 p-2 rounded-full">
                            <i class="fas fa-shopping-basket text-green-500"></i>
                        </div>
                        <span class="font-medium">Add Shop Item</span>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </a>
                
                <a href="{{ route('admin.orders') }} " class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-300">
                    <div class="flex items-center space-x-3">
                        <div class="bg-yellow-100 p-2 rounded-full">
                            <i class="fas fa-file-invoice text-yellow-500"></i>
                        </div>
                        <span class="font-medium">Order Details</span>
                    </div>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                </a>
            </div>
        </div>
    </div>
@endsection