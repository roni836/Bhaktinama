@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundali Service</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5; /* Light gray background */
        }
        .card {
            background-color: #ffffff;
            border-radius: 0.75rem; /* rounded-xl */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* shadow-md */
            overflow: hidden;
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-image {
            width: 100%;
            height: 180px; /* Fixed height for consistency */
            object-fit: cover;
        }
        .card-title {
            background-color: #2c3e50; /* Dark blue-gray for title background */
            color: #ffffff;
            padding: 0.75rem 1rem;
            text-align: center;
            font-weight: 500; /* font-medium */
        }
        .pagination-button {
            background-color: #f39c12; /* Orange for active pagination */
            color: #ffffff;
            border-radius: 9999px; /* rounded-full */
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }
        .pagination-button:hover {
            background-color: #e67e22; /* Darker orange on hover */
        }
        .pagination-button.inactive {
            background-color: #e0e0e0; /* Light gray for inactive pagination */
            color: #333333;
        }
        .pagination-button.inactive:hover {
            background-color: #cccccc;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Header Section -->
    <header class="bg-white shadow-sm py-4 px-6 md:px-12 lg:px-24 flex items-center justify-between">
        <a href="{{route('homepage')}}" class="text-gray-600 hover:text-gray-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Go Back
        </a>
        <h1 class="text-2xl font-semibold text-gray-800">Kundali Service</h1>
        <div></div> <!-- Placeholder for right alignment -->
    </header>

    <!-- Main Content Section - Kundali Service Cards -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Janam Kundali Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Janam+Kundali" alt="Janam Kundali" class="card-image">
                <div class="card-title">Janam Kundali</div>
            </div>

            <!-- Kundali Matching Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Kundali+Matching" alt="Kundali Matching" class="card-image">
                <div class="card-title">Kundali Matching</div>
            </div>

            <!-- Kundali Dosha Check Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Kundali+Dosha" alt="Kundali Dosha Check" class="card-image">
                <div class="card-title">Kundali Dosha Check</div>
            </div>

            <!-- Kundali Predictions Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Kundali+Predictions" alt="Kundali Predictions" class="card-image">
                <div class="card-title">Kundali Predictions</div>
            </div>

            <!-- Palmistry Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Palmistry" alt="Palmistry" class="card-image">
                <div class="card-title">Palmistry</div>
            </div>

            <!-- Face Reading Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Face+Reading" alt="Face Reading" class="card-image">
                <div class="card-title">Face Reading</div>
            </div>

            <!-- Tarot Card Reading Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Tarot+Card" alt="Tarot Card Reading" class="card-image">
                <div class="card-title">Tarot Card Reading</div>
            </div>

            <!-- Nadi Astrology Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Nadi+Astrology" alt="Nadi Astrology" class="card-image">
                <div class="card-title">Nadi Astrology</div>
            </div>

            <!-- Dream Interpretation Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Dream+Interpretation" alt="Dream Interpretation" class="card-image">
                <div class="card-title">Dream Interpretation</div>
            </div>

            <!-- Baby Naming as per Astrology Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Baby+Naming" alt="Baby Naming as per Astrology" class="card-image">
                <div class="card-title">Baby Naming as per Astrology</div>
            </div>

            <!-- Aura & Chakra Reading Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Aura+Chakra" alt="Aura & Chakra Reading" class="card-image">
                <div class="card-title">Aura & Chakra Reading</div>
            </div>

            <!-- Evil Eye & Negative Energy Removal Card -->
            <div class="card">
                <img src="https://placehold.co/600x400/2c3e50/ffffff?text=Evil+Eye" alt="Evil Eye & Negative Energy Removal" class="card-image">
                <div class="card-title">Evil Eye & Negative Energy Removal</div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center space-x-2 mt-8">
            <div class="pagination-button">1</div>
            <div class="pagination-button inactive">2</div>
            <div class="pagination-button inactive">3</div>
            <div class="pagination-button inactive">4</div>
            <div class="pagination-button inactive">5</div>
            <div class="pagination-button inactive">6</div>
        </div>
    </main>

    

</body>
</html>



@endsection