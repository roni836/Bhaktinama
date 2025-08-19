<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - MyPoojaPandit</title>
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
        <div class="relative hidden lg:block lg:w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('images/pandit vip look.jpg') }}');">
            <!-- Optional: Overlay for better text readability if needed -->
            <div class="absolute inset-0 bg-black opacity-30"></div>
        </div>

        <!-- Right Section - Login Form -->
        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-8 lg:p-16 bg-white">
            <div class="w-full max-w-md">
                <div class="flex justify-between items-center mb-8">
                    <a href="{{route('homepage')}}" class="text-gray-600 hover:text-orange-500 flex items-center space-x-2">
                        <i class="fas fa-arrow-left"></i>
                        <span>Go Back</span>
                    </a>
                    <div class="flex space-x-4">
                        <a href="{{route('login')}}" class="text-orange-500 hover:underline font-medium">User Login</a>
                        <a href="{{route('panditlogin')}}" class="text-orange-500 hover:underline font-medium">Pandit Login</a>
                    </div>
                </div>

                <h2 class="text-3xl font-bold mb-4 text-gray-900">Admin Login</h2>
                <p class="text-gray-600 mb-8">Sign in to manage the MyPoojaPandit platform</p>

                <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 pr-10">
                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer toggle-password">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center text-gray-700">
                            <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-orange-500 rounded border-gray-300 focus:ring-orange-500 mr-2">
                            Remember me
                        </label>
                        <a href="#" class="text-orange-500 hover:underline font-medium">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full bg-gray-900 hover:bg-gray-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
                        Login
                    </button>
                </form>

                <p class="text-center text-gray-500 text-xs mt-8">
                    <a href="#" class="hover:underline">Terms of Service</a> • <a href="#" class="hover:underline">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.querySelector('#password');
            const passwordType = passwordInput.getAttribute('type');
            
            if (passwordType === 'password') {
                passwordInput.setAttribute('type', 'text');
                this.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.setAttribute('type', 'password');
                this.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    </script>
</body>
</html>
