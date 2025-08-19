@extends('layouts.admin')

@section('title', 'Pandits Management')


@section('content')

<div class="p-6 max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-orange-600">Pandit List</h1>
        <a href="{{ route('admin.pandits.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-full">+ Pandit</a>
    </div>

    <!-- City Filter -->
    <div class="flex flex-wrap gap-3 mb-6">
        <button class="px-4 py-2 rounded-full border bg-orange-500 text-white">ALL</button>
        <button class="px-4 py-2 rounded-full border">Patna</button>
        <button class="px-4 py-2 rounded-full border">Surat</button>
        <button class="px-4 py-2 rounded-full border">Ahmedabad</button>
        <button class="px-4 py-2 rounded-full border">Pune</button>
        <button class="px-4 py-2 rounded-full border">Mumbai</button>
        <button class="px-4 py-2 rounded-full border">Kolkata</button>
        <button class="px-4 py-2 rounded-full border">Bangalore</button>
        <button class="px-4 py-2 rounded-full border">Delhi</button>
    </div>

    <!-- Search -->
    <div class="flex justify-end mb-6">
        <div class="flex items-center border rounded-full px-3">
            <input type="text" placeholder="Search temples.."
                class="px-2 py-1 outline-none bg-transparent">
            <span class="text-gray-500">🔍</span>
        </div>
    </div>

    <!-- Pandit Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Card -->
        <div class="bg-white shadow rounded-xl overflow-hidden">
            <img src="https://source.unsplash.com/400x250/?hindu,sage"
                class="w-full h-48 object-cover" alt="">
            <div class="p-4">
                <h2 class="font-semibold text-lg">Pandit Ramesh Upadhyay</h2>
                <div class="flex items-center justify-between mt-3">
                    <div class="flex space-x-3 text-gray-600">
                        <button class="text-orange-500">✎</button>
                        <button class="text-blue-500">ℹ️</button>
                    </div>
                    <!-- Toggle -->
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only" checked>
                        <div class="w-10 h-5 bg-gray-300 rounded-full p-1 flex items-center">
                            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Duplicate cards for demo -->
        <div class="bg-white shadow rounded-xl overflow-hidden">
            <img src="https://source.unsplash.com/400x250/?priest,temple"
                class="w-full h-48 object-cover" alt="">
            <div class="p-4">
                <h2 class="font-semibold text-lg">Pandit Arun Kumar</h2>
                <div class="flex items-center justify-between mt-3">
                    <div class="flex space-x-3 text-gray-600">
                        <button class="text-orange-500">✎</button>
                        <button class="text-blue-500">ℹ️</button>
                    </div>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only">
                        <div class="w-10 h-5 bg-gray-300 rounded-full p-1 flex items-center">
                            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded-xl overflow-hidden">
            <img src="https://source.unsplash.com/400x250/?monk,india"
                class="w-full h-48 object-cover" alt="">
            <div class="p-4">
                <h2 class="font-semibold text-lg">Pandit Mukesh Joshi</h2>
                <div class="flex items-center justify-between mt-3">
                    <div class="flex space-x-3 text-gray-600">
                        <button class="text-orange-500">✎</button>
                        <button class="text-blue-500">ℹ️</button>
                    </div>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only" checked>
                        <div class="w-10 h-5 bg-gray-300 rounded-full p-1 flex items-center">
                            <div class="w-4 h-4 bg-orange-500 rounded-full"></div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Add more static cards as needed -->
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-6 space-x-2">
        <button class="px-3 py-1 rounded bg-gray-200">Previous</button>
        <button class="px-3 py-1 rounded bg-orange-500 text-white">1</button>
        <button class="px-3 py-1 rounded bg-gray-200">2</button>
        <button class="px-3 py-1 rounded bg-gray-200">3</button>
        <button class="px-3 py-1 rounded bg-gray-200">Next</button>
    </div>
</div>


@endsection