<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\User;
use App\Models\Pandit;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Product;
use App\Models\Temple;
use App\Models\Service;
use App\Models\Blog;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    // Authentication
    public function showLoginForm()
    {
        return view('adminlogin');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('adminlogin')->with('success', 'Logged out successfully.');
    }

    // Dashboard
    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_pandits' => Pandit::count(),
            'total_bookings' => Booking::count(),
            'total_orders' => Order::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'active_pandits' => Pandit::where('is_active', true)->count(),
        ];

        $recent_bookings = Booking::with(['user', 'pandit'])
            ->latest()
            ->take(5)
            ->get();

        $recent_orders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_bookings', 'recent_orders'));
    }

    // User Management
    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function toggleUserStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();

        return back()->with('success', 'User status updated successfully.');
    }

    // Bookings
    public function bookings()
    {
        $bookings = Booking::with(['user', 'pandit'])
            ->latest()
            ->paginate(20);
        return view('admin.bookings', compact('bookings'));
    }

    public function updateBookingStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', 'Booking status updated successfully.');
    }

    // Pandit Management
    public function pandits()
    {
        $pandits = Pandit::latest()->paginate(20);
        return view('admin.pandits', compact('pandits'));
    }

    public function createPandit()
    {
        
        $response = Http::post('https://countriesnow.space/api/v0.1/countries/states', [
            'country' => 'India'
        ]);

        $states = [];
        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['data']['states'])) {
                $states = collect($data['data']['states'])->pluck('name');
            }
        }
        return view('admin.add-pandit', compact('states'));
    }

    public function storePandit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pandits',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'phone' => 'required|string|max:15',
            // 'password' => 'required|string|min:6',
            'specialization' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // Handle profile image upload
        $profileImagePath = null;
        if ($request->hasFile('profile_image')) {
            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(
                public_path('images/pandits'),
                $imageName
            );
            $profileImagePath = 'images/pandits/' . $imageName;
        }

        Pandit::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'profile_image' => $profileImagePath,
            'password'       => Hash::make('pandit@123'),
            'specialization' => $request->specialization,
            'location' => $request->location,
            'bio' => $request->bio,
            'is_verified' => true,
            'is_active' => true,
        ]);

        return redirect()->route('admin.pandits')->with('success', 'Pandit added successfully.');
    }

    public function togglePanditStatus($id)
    {
        $pandit = Pandit::findOrFail($id);
        $pandit->is_active = !$pandit->is_active;
        $pandit->save();

        return back()->with('success', 'Pandit status updated successfully.');
    }

    // Product Management
    public function products()
    {
        $products = Product::latest()->paginate(20);
        return view('admin.products', compact('products'));
    }

    public function createProduct()
    {
        return view('admin.add-product');
    }

    public function storeProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
            $data['image'] = 'images/products/' . $imageName;
        }

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Product added successfully.');
    }

    // Orders Management
    public function orders()
    {
        $orders = Order::with('user')->latest()->paginate(20);
        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Order status updated successfully.');
    }

    // Temple Management
    public function temples()
    {
        $temples = Temple::latest()->paginate(20);
        return view('admin.temples', compact('temples'));
    }

    public function createTemple()
    {
        return view('admin.add-temple');
    }

    public function storeTemple(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'deity' => 'nullable|string|max:255',
            'timings' => 'nullable|string|max:255',
            'entry_fee' => 'nullable|numeric|min:0',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Temple::create($request->all());

        return redirect()->route('admin.temples')->with('success', 'Temple added successfully.');
    }

    public function toggleTempleStatus($id)
    {
        $temple = Temple::findOrFail($id);
        $temple->is_active = !$temple->is_active;
        $temple->save();

        return back()->with('success', 'Temple status updated successfully.');
    }

    // Service Management
    public function services()
    {
        $services = Service::latest()->paginate(20);
        return view('admin.services', compact('services'));
    }

    public function createService()
    {
       
        $response = Http::post('https://countriesnow.space/api/v0.1/countries/states', [
            'country' => 'India'
        ]);

        $states = [];
        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['data']['states'])) {
                $states = collect($data['data']['states'])->pluck('name');
            }
        }
        return view('admin.add-service', compact('states'));
    }

    public function storeService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'introduction' => 'nullable|string',
            'importance' => 'nullable|string',
            'traditions' => 'nullable|string',
            'service_type' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'packages' => 'nullable|array',
            'packages.*.name' => 'nullable|string|max:255',
            'packages.*.price' => 'nullable|numeric|min:0',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:500',
            'faqs.*.answer' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images/services'), $imageName);
                $imagePaths[] = 'images/services/' . $imageName;
            }
            $data['images'] = $imagePaths;
        }

        // Filter out empty packages
        if ($request->packages) {
            $data['packages'] = array_filter($request->packages, function ($package) {
                return !empty($package['name']) || !empty($package['price']);
            });
        }

        // Filter out empty FAQs
        if ($request->faqs) {
            $data['faqs'] = array_filter($request->faqs, function ($faq) {
                return !empty($faq['question']) || !empty($faq['answer']);
            });
        }

        Service::create($data);

        return redirect()->route('admin.services')->with('success', 'Service added successfully.');
    }

    public function toggleServiceStatus($id)
    {
        $service = Service::findOrFail($id);
        $service->is_active = !$service->is_active;
        $service->save();

        return back()->with('success', 'Service status updated successfully.');
    }

    // Blog Management
    public function blogs()
    {
        $blogs = Blog::latest()->paginate(20);
        return view('admin.blogs', compact('blogs'));
    }

    public function createBlog()
    {
        return view('admin.add-blog');
    }

    public function storeBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'author' => 'nullable|string|max:100',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $data['image'] = 'images/blogs/' . $imageName;
        }

        if ($request->tags) {
            $data['tags'] = array_map('trim', explode(',', $request->tags));
        }

        if ($request->is_published) {
            $data['published_at'] = now();
        }

        Blog::create($data);

        return redirect()->route('admin.blogs')->with('success', 'Blog post added successfully.');
    }

    public function toggleBlogStatus($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->is_published = !$blog->is_published;
        if ($blog->is_published && !$blog->published_at) {
            $blog->published_at = now();
        }
        $blog->save();

        return back()->with('success', 'Blog status updated successfully.');
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit-product', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && file_exists(public_path('images/products/' . basename($product->image)))) {
                unlink(public_path('images/products/' . basename($product->image)));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
            $data['image'] = 'images/products/' . $imageName;
        }

        $product->update($data);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        // Delete associated image if exists
        if ($product->image && file_exists(public_path('images/products/' . basename($product->image)))) {
            unlink(public_path('images/products/' . basename($product->image)));
        }

        $product->delete();

        return back()->with('success', 'Product deleted successfully.');
    }

    public function editTemple($id)
    {
        $temple = Temple::findOrFail($id);
        return view('admin.edit-temple', compact('temple'));
    }

    public function updateTemple(Request $request, $id)
    {
        $temple = Temple::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'deity' => 'nullable|string|max:255',
            'timings' => 'nullable|string|max:255',
            'entry_fee' => 'nullable|numeric|min:0',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($temple->image && file_exists(public_path('images/temples/' . basename($temple->image)))) {
                unlink(public_path('images/temples/' . basename($temple->image)));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/temples'), $imageName);
            $data['image'] = 'images/temples/' . $imageName;
        }

        $temple->update($data);

        return redirect()->route('admin.temples')->with('success', 'Temple updated successfully.');
    }

    public function deleteTemple($id)
    {
        $temple = Temple::findOrFail($id);

        // Delete associated image if exists
        if ($temple->image && file_exists(public_path('images/temples/' . basename($temple->image)))) {
            unlink(public_path('images/temples/' . basename($temple->image)));
        }

        $temple->delete();

        return back()->with('success', 'Temple deleted successfully.');
    }

    public function editService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.edit-service', compact('service'));
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'introduction' => 'nullable|string',
            'importance' => 'nullable|string',
            'traditions' => 'nullable|string',
            'service_type' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'packages' => 'nullable|array',
            'packages.*.name' => 'nullable|string|max:255',
            'packages.*.price' => 'nullable|numeric|min:0',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:500',
            'faqs.*.answer' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            // Delete old images if exists
            if ($service->images && is_array($service->images)) {
                foreach ($service->images as $oldImage) {
                    if (file_exists(public_path($oldImage))) {
                        unlink(public_path($oldImage));
                    }
                }
            }

            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images/services'), $imageName);
                $imagePaths[] = 'images/services/' . $imageName;
            }
            $data['images'] = $imagePaths;
        }

        // Filter out empty packages
        if ($request->packages) {
            $data['packages'] = array_filter($request->packages, function ($package) {
                return !empty($package['name']) || !empty($package['price']);
            });
        }

        // Filter out empty FAQs
        if ($request->faqs) {
            $data['faqs'] = array_filter($request->faqs, function ($faq) {
                return !empty($faq['question']) || !empty($faq['answer']);
            });
        }

        $service->update($data);

        return redirect()->route('admin.services')->with('success', 'Service updated successfully.');
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);

        // Delete associated images if exist
        if ($service->images && is_array($service->images)) {
            foreach ($service->images as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }

        $service->delete();

        return back()->with('success', 'Service deleted successfully.');
    }
}
