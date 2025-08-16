<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - MyPoojaPandit</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .btn-gradient { background: linear-gradient(to right, #FF7B00, #FF9F00); }
        .text-gradient {
            background: linear-gradient(to right, #FF7B00, #FF9F00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-white text-gray-800">
    @include('layouts.partials.header')
    
    @yield('content')
    
    @include('layouts.partials.footer')
    
    @yield('scripts')
    @stack('scripts')
</body>
</html>