<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login - MyPoojaPandit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-800 h-screen flex flex-col">

    <div class="flex flex-1 flex-col lg:flex-row">
        <!-- Left Section - Background Image -->
        <div class="relative hidden lg:block lg:w-1/2 bg-cover bg-center"
             style="background-image: url('https://placehold.co/800x1000/FEEBC8/FF7B00?text=Temple');">
            <div class="absolute inset-0 bg-black opacity-30"></div>
        </div>

        <!-- Right Section - Login Form -->
        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-8 lg:p-16 bg-white">
            <div class="w-full max-w-md">

                {{-- <!-- Top Nav (switch between logins) -->
                <div class="flex justify-end space-x-4 mb-8">
                    <a href="{{ route('adminlogin') }}" class="text-orange-500 hover:underline font-medium">Admin</a>
                    <a href="{{ route('login') }}" class="text-orange-500 hover:underline font-medium">User</a>
                    <a href="{{ route('panditlogin') }}" class="text-orange-600 font-semibold underline">Pandit</a>
                </div> --}}

                <h2 class="text-3xl font-bold mb-4 text-gray-900">Welcome Back, Pandit Ji 🙏</h2>
                <p class="text-gray-600 mb-8">Sign in to continue your spiritual journey</p>

                <form class="space-y-6" method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               placeholder="Enter your email"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500"
                               required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                   placeholder="Enter your password"
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 pr-10"
                                   required>
                            <span id="togglePassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center text-gray-700">
                            <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-orange-500 mr-2">
                            Remember me
                        </label>
                        <a href="#" class="text-orange-500 hover:underline font-medium">Forgot password?</a>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                            class="w-full bg-gray-900 hover:bg-gray-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
                        Login
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative flex items-center justify-center my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative bg-white px-4 text-sm text-gray-500">or continue with</div>
                </div>

                <!-- Google Login -->
                <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center space-x-3 px-4 py-3 rounded-full border border-gray-300 hover:bg-gray-50 transition duration-300 shadow-sm">
                    <img src="https://www.google.com/favicon.ico" alt="Google icon" class="w-5 h-5">
                    <span class="text-gray-700 font-medium">Google</span>
                </a>

                <!-- Signup -->
                <p class="text-center text-gray-600 text-sm mt-8">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-orange-500 hover:underline font-semibold">Sign up</a>
                </p>
                <p class="text-center text-gray-500 text-xs mt-2">
                    <a href="#" class="hover:underline">Terms of Service</a> •
                    <a href="#" class="hover:underline">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Toggle Password Script -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>
