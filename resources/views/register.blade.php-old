<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - MyPoojaPandit</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom gradient for buttons */
        .btn-gradient {
            background: linear-gradient(to right, #FF7B00, #FF9F00);
        }
        .text-gradient {
            background: linear-gradient(to right, #FF7B00, #FF9F00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-white text-gray-800 h-screen flex flex-col">

    <!-- Main Content Area -->
    <div class="flex flex-1 flex-col lg:flex-row">
        <!-- Left Section - Image Background -->
        <div class="relative hidden lg:block lg:w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('https://placehold.co/800x1000/FEEBC8/FF7B00?text=Temple') }}');">
            <!-- Optional: Overlay for better text readability if needed -->
            <div class="absolute inset-0 bg-black opacity-30"></div>
        </div>

        <!-- Right Section - Sign Up Form -->
        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-8 lg:p-16 bg-white">
            <div class="w-full max-w-md">
                <div class="flex justify-between items-center mb-8">
                    <a href="{{route('homepage')}}" class="text-gray-600 hover:text-orange-500 flex items-center space-x-2">
                        <i class="fas fa-arrow-left"></i>
                        <span>Go Back</span>
                    </a>

                    <a href="{{route('panditregister')}}" class="text-orange-500 hover:underline font-medium"> pandit signup</a>
                    <!-- Removed "User Login" link as it's a signup page -->
                </div>

                <h2 class="text-3xl font-bold mb-4 text-gray-900">Create Your Account</h2>
                <p class="text-gray-600 mb-8">Join our community for spiritual guidance</p>

                <form class="space-y-6" method="POST" action="{{ route('register.submit') }}">
                    @csrf
                    <div>
                        <label for="full_name" class="block text-gray-700 text-sm font-semibold mb-2">Full Name</label>
                        <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 @error('full_name') border-red-500 @enderror" value="{{ old('full_name') }}">
                        @error('full_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email_phone" class="block text-gray-700 text-sm font-semibold mb-2">Email Address / Phone Number</label>
                        <input type="text" id="email_phone" name="email_phone" placeholder="Enter the email / phone number" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 @error('email_phone') border-red-500 @enderror" value="{{ old('email_phone') }}">
                        @error('email_phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 pr-10 @error('password') border-red-500 @enderror">
                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer toggle-password">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Confirm Password</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 pr-10">
                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer toggle-password">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center text-sm">
                        <label class="flex items-center text-gray-700">
                            <input type="checkbox" name="terms" class="form-checkbox h-4 w-4 text-orange-500 rounded border-gray-300 focus:ring-orange-500 mr-2" @error('terms') class="border-red-500" @enderror>
                            I agree to the <a href="#" class="text-orange-500 hover:underline font-medium ml-1">Terms of Service</a> and <a href="#" class="text-orange-500 hover:underline font-medium ml-1">Privacy Policy</a>
                        </label>
                    </div>
                    @error('terms')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="w-full bg-gray-900 hover:bg-gray-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
                        Sign Up
                    </button>
                </form>

                <div class="relative flex items-center justify-center my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative bg-white px-4 text-sm text-gray-500">
                        or continue with
                    </div>
                </div>

                <button class="w-full flex items-center justify-center space-x-3 px-4 py-3 rounded-full border border-gray-300 hover:bg-gray-50 transition duration-300 shadow-sm">
                    <img src="https://www.google.com/favicon.ico" alt="Google icon" class="w-5 h-5">
                    <span class="text-gray-700 font-medium">Google</span>
                </button>

                <p class="text-center text-gray-600 text-sm mt-8">
                    Already have an account? <a href="{{route('login')}}" class="text-orange-500 hover:underline font-semibold">Login</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>
