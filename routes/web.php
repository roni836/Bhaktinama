<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanditController;
use App\Http\Controllers\ServiceController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/aa', [PanditController::class, 'aa'])->name("aa");
Route::get('/curent', [PanditController::class, 'current'])->name("curent");

// Frontend Routes
Route::get('/', [UserController::class, 'index'])->name("homepage");
Route::get('/services', [UserController::class, 'services'])->name("services");
Route::get('/shop', [UserController::class, 'shop'])->name("shop");
Route::get('/about', [UserController::class, 'about'])->name("about");
Route::get('/blog', [UserController::class, 'blog'])->name("blog");
Route::get('/contact', [UserController::class, 'contact'])->name("contact");
Route::post('/contact', [UserController::class, 'contactSubmit'])->name("contact.submit");

Route::get('/bookpandit/{id}', [UserController::class, 'bookpandit'])->name("bookpandit");
Route::get('/astrology', [UserController::class, 'astrology'])->name("astrology");
Route::get('/temple', [UserController::class, 'temple'])->name("temple");
Route::get('/service-single-view', [UserController::class, 'SingleView'])->name('service-single-view.index');
Route::get('/service-single-view/{id}', [UserController::class, 'show'])->name('service-single-view');
Route::get('/kundalini', [UserController::class, 'kundalini'])->name("kundalini");
Route::get('/annaprashan', [UserController::class, 'annaprashan'])->name("annaprashan");
Route::get('/aa', [UserController::class, 'aa'])->name("aa");
Route::get('/service-booking', [ServiceController::class, 'createBooking'])->name('service-booking');
Route::post('/service-booking', [ServiceController::class, 'bookService'])->name('service-booking');
Route::get('/select-pandits', [serviceController::class, 'index'])->name('select-pandits');
Route::get('/select-pandit/{id}', [serviceController::class, 'show'])->name('select-pandit');


// Pandit Dashboard Routes (Protected)

Route::middleware(['auth', 'role:pandit'])->prefix('pandit')->name('pandit.')->group(function () {
    Route::get('/', [PanditController::class, 'dashboard'])->name('dashboard');
    Route::post('/change-password', [PanditController::class, 'changePassword'])->name('changePassword');


    Route::get('/current-bookings', [PanditController::class, 'currentBookings'])->name('current.bookings');
    Route::get('/previous-bookings', [PanditController::class, 'previousBookings'])->name('previous.bookings');
    Route::get('/profile', [PanditController::class, 'profile'])->name('profile');
    Route::put('/profile', [PanditController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [PanditController::class, 'logout'])->name('logout');
});

// Admin Authentication Routes (Public)
Route::get('/adminlogin', [AdminController::class, 'showLoginForm'])->name('adminlogin');
Route::post('/adminlogin', [AdminController::class, 'login'])->name('admin.login.submit');

// Pandit Management
Route::get('/pandits', [AdminController::class, 'pandits'])->name('pandits');
Route::get('/pandits/create', [AdminController::class, 'createPandit'])->name('pandits.create');
Route::post('/pandits', [AdminController::class, 'storePandit'])->name('pandits.store');
Route::patch('/pandits/{id}/toggle-status', [AdminController::class, 'togglePanditStatus'])->name('pandits.toggle-status');

// Temple Management
Route::get('/temples', [AdminController::class, 'temples'])->name('temples');
Route::get('/temples/create', [AdminController::class, 'createTemple'])->name('temples.create');
Route::post('/temples', [AdminController::class, 'storeTemple'])->name('temples.store');
Route::get('/temples/{id}/edit', [AdminController::class, 'editTemple'])->name('temples.edit');
Route::put('/temples/{id}', [AdminController::class, 'updateTemple'])->name('temples.update');
Route::delete('/temples/{id}', [AdminController::class, 'deleteTemple'])->name('temples.delete');
Route::patch('/temples/{id}/toggle-status', [AdminController::class, 'toggleTempleStatus'])->name('temples.toggle-status');

// User Authentication Routes
Route::post('/login', [UserController::class, 'loginUser'])->name('login.submit');
Route::post('/register', [UserController::class, 'registerUser'])->name('register.submit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// User Dashboard Routes (Protected)
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('change-password');
    Route::put('/change-password', [UserController::class, 'updatePassword'])->name('change-password.update');
    Route::get('/bookings', [UserController::class, 'bookings'])->name('bookings');
    Route::get('/orders', [UserController::class, 'orders'])->name('orders');
});

Route::get('/register', [AuthController::class, 'showUserRegister'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register.submit');

Route::get('auth/google', [AuthController::class, 'redirect'])->name('google.login');
Route::get('auth/google/callback', [AuthController::class, 'callback']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // User Management
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::patch('/users/{id}/toggle-status', [AdminController::class, 'toggleUserStatus'])->name('users.toggle-status');

    // Booking Management
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
    Route::patch('/bookings/{id}/status', [AdminController::class, 'updateBookingStatus'])->name('bookings.update-status');

    Route::get('/contacts', [AdminController::class, 'contacts'])->name('admin.contacts');

    // Pandit Management
    Route::get('/pandits', [AdminController::class, 'pandits'])->name('pandits');
    Route::get('/pandits/create', [AdminController::class, 'createPandit'])->name('pandits.create');
    Route::post('/pandits', [AdminController::class, 'storePandit'])->name('pandits.store');
    Route::patch('/pandits/{id}/toggle-status', [AdminController::class, 'togglePanditStatus'])->name('pandits.toggle-status');

    // Temple Management
    Route::get('/temples', [AdminController::class, 'temples'])->name('temples');
    Route::get('/temples/create', [AdminController::class, 'createTemple'])->name('temples.create');
    Route::post('/temples', [AdminController::class, 'storeTemple'])->name('temples.store');
    Route::get('/temples/{id}/edit', [AdminController::class, 'editTemple'])->name('temples.edit');
    Route::put('/temples/{id}', [AdminController::class, 'updateTemple'])->name('temples.update');
    Route::delete('/temples/{id}', [AdminController::class, 'deleteTemple'])->name('temples.delete');
    Route::patch('/temples/{id}/toggle-status', [AdminController::class, 'toggleTempleStatus'])->name('temples.toggle-status');


    Route::get('/product-categories', [AdminController::class, 'createProductCategory'])->name('product-categories.create');
    Route::post('/product-categories/store', [AdminController::class, 'storeProductCategory'])->name('product-categories.store');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('products.delete');

    // Order Management
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::patch('/orders/{id}/update-status', [AdminController::class, 'updateOrderStatus'])->name('orders.update-status');

    // Service Management
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/service-categories/store', [ServiceController::class, 'store'])->name('service-categories.store');
    Route::get('/services', [ServiceController::class, 'services'])->name('services');
    Route::get('/services/create', [ServiceController::class, 'createService'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'storeService'])->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'editService'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'updateService'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'deleteService'])->name('services.delete');
    Route::patch('/services/{id}/toggle-status', [ServiceController::class, 'toggleServiceStatus'])->name('services.toggle-status');

    // Blog Management
    Route::get('/blogs', [AdminController::class, 'blogs'])->name('blogs');
    Route::get('/blogs/{id}', [AdminController::class, 'blogs'])->name('admin.blogs.edit');
    Route::get('/blogs/create', [AdminController::class, 'createBlog'])->name('blogs.create');
    Route::post('/blogs', [AdminController::class, 'storeBlog'])->name('blogs.store');
    Route::patch('/blogs/{id}/toggle-status', [AdminController::class, 'toggleBlogStatus'])->name('blogs.toggle-status');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/test', function () {
        return 'Admin Testing';
    });
});

// Pandit routes
Route::middleware(['auth', 'role:pandit'])->group(function () {
    Route::get('/pandit/test', function () {
        return 'Pandit Testing';
    });
});

// User routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/test', function () {
        return 'User Testing';
    });
});
