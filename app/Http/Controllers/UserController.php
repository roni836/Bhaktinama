<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Temple;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function services()
    {
        $data['categories'] = ServiceCategory::all();
        $data['services']   = Service::where('id', 3)->get();
        return view("services", $data);
    }
    public function shop()
    {
        $data['categories'] = ProductCategory::all();
        $data['shop'] = Product::all();
        return view("shop", $data);
    }

    public function cartIndex()
    {
        // Sample data, you can replace this with database or session data
        $cartItems = [
            [
                'id' => 1,
                'name' => 'Sandalwood Incense Sticks',
                'description' => 'Premium Quality Pack of 20 sticks',
                'price' => 999,
                'quantity' => 1,
                'image' => 'https://placehold.co/80x80',
            ],
            [
                'id' => 2,
                'name' => 'Brass Diya Lamp',
                'description' => 'Hand Crafted Size: 4 inches',
                'price' => 499,
                'quantity' => 1,
                'image' => 'https://placehold.co/80x80',
            ],
            [
                'id' => 3,
                'name' => 'Temple Prasad Box',
                'description' => 'Fresh Daily Weight: 500g',
                'price' => 999,
                'quantity' => 1,
                'image' => 'https://placehold.co/80x80',
            ],
        ];

        $subtotal = collect($cartItems)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $shippingFee = 50;
        $gst = round($subtotal * 0.18);
        $total = $subtotal + $shippingFee + $gst;

        return view('my-cart', compact('cartItems', 'subtotal', 'shippingFee', 'gst', 'total'));
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;
        $quantity = (int) $request->quantity;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $quantity,
                'image' => $request->image
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => $request->name . ' added to cart!',
            'cartCount' => count($cart)
        ]);
    }

    // Update quantity of a cart item
    public function updateQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        // Here you should update quantity in session or database
        return back()->with('success', 'Quantity updated!');
    }

    // Remove item from cart
    public function removeItem(Request $request)
    {
        $request->validate(['id' => 'required|integer']);

        // Remove from session or database
        return back()->with('success', 'Item removed!');
    }

    // Apply coupon
    public function applyCoupon(Request $request)
    {
        $request->validate(['coupon' => 'required|string']);

        // Check coupon logic here
        $discount = 50; // example flat discount
        return back()->with('success', "Coupon applied! Discount: INR $discount");
    }
    public function checkout(Request $request)
    {
        // Demo address (replace with user data from DB in real app)
        $address = [
            'name'  => 'Aditya Sharma',
            'email' => 'aditya.sharma@email.com',
            'phone' => '+91 98765 43210',
            'line1' => '42 Rajmahal Avenue, Apartment 301, Silver Heightsv',
            'city'  => 'Mumbai',
            'pin'   => '400001',
        ];

        // Get item IDs from request parameters
        $itemIds = $request->input('items', []); // e.g., items[]=1&items[]=2
        $cartItems = Product::whereIn('id', $itemIds)->get();

        // Calculate totals
        $subtotal = $cartItems->sum(fn($i) => $i->price); // assuming qty = 1, or you can add qty param
        $shipping = 50;
        $gst      = round(0.18 * ($subtotal + $shipping)); // 18% GST
        $total    = $subtotal + $shipping + $gst;

        return view('checkout', [
            'address'  => $address,
            'cart'     => $cartItems,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'gst'      => $gst,
            'total'    => $total,
        ]);
    }


    public function processCheckout(Request $request)
    {
        // Validate and process the checkout
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city'  => 'required|string|max:100',
            'pin'   => 'required|string|max:10',
        ]);

        // Here you would typically create an order in the database

        return redirect()->route('homepage')->with('success', 'Order placed successfully!');
    }
    public function place(Request $request)
    {
        $cart = json_decode($request->input('cart'), true);
        $address = json_decode($request->input('address'), true);

        // Now $cart is an array and passes validation
        $request->merge(['cart' => $cart, 'address' => $address]);

        $request->validate([
            'cart' => 'required|array|min:1',
            'payment_method' => 'required|string',
            'total_amount' => 'required|numeric',
            'address' => 'required|array',
        ]);

        $shippingAddress = is_array($request->address) ? json_encode($request->address) : $request->address;
        // Create the main order
        $order = Order::create([
            'user_id' => auth()->id(),
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_method == 'cod' ? 'pending' : 'payment_pending',
            'shipping_address' => $shippingAddress,
            'total_amount' => $request->total_amount,
        ]);

        // Create order items
        foreach ($request->cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Redirect to order confirmation page
        return redirect()->route('order.confirmation', $order->id)
            ->with('success', 'Order placed successfully!');
    }

    public function orderConfirmation($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('order', compact('order'));
    }



    public function about()
    {
        return view("about");
    }
    public function blog()
    {
        $data['blog'] = Blog::all();
        return view("blog", $data);
    }
    public function contact()
    {
        return view("contact");
    }
    public function login()
    {
        return view("login");
    }
    public function register()
    {
        return view("register");
    }
    public function panditregister()
    {
        return view("panditregister");
    }
    public function bookpandit($id)
    {
        $data['bookpandit'] = Service::all();
        $data['categories'] = ServiceCategory::findOrFail($id);
        return view("bookpandit", $data);
    }

    public function SingleView()
    {
        // Show all services (for listing page)
        $services = Service::all();
        return view("service-single-view.index", compact('services'));
    }
    public function show($id)
    {
        $service = Service::with('packages')->findOrFail($id);
        return view("service-single-view", compact('service'));
    }
    public function astrology()
    {

        return view("astrology");
    }
    public function temple()
    {
        $data['temple'] = Temple::all();
        return view("temple", $data);
    }
    public function kundalini()
    {

        return view("kundalini");
    }
    public function aa()
    {

        return view("aa");
    }

    public function annaprashan()
    {
        return view("annaprashan");
    }

    // User Authentication Methods

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name'   => 'required|string|max:255',
            'email_phone' => 'required|string',
            'password'    => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Check if input is email or phone
        $isEmail = filter_var($request->email_phone, FILTER_VALIDATE_EMAIL);

        // Create user
        $user       = new User();
        $user->name = $request->full_name;

        if ($isEmail) {
            // Validate email uniqueness
            $emailExists = User::where('email', $request->email_phone)->exists();
            if ($emailExists) {
                return back()->withErrors(['email_phone' => 'This email is already registered.'])->withInput();
            }
            $user->email = $request->email_phone;
        } else {
            // For phone number, we need to add a phone field to the users table
            // This would require a migration
            $phoneExists = User::where('phone', $request->email_phone)->exists();
            if ($phoneExists) {
                return back()->withErrors(['email_phone' => 'This phone number is already registered.'])->withInput();
            }
            $user->phone = $request->email_phone;
            $user->email = $request->email_phone . '@placeholder.com'; // Placeholder email
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Log the user in
        Auth::login($user);

        return redirect('/');
    }

    /**
     * Log the user out
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Show user dashboard
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }

    /**
     * Show user profile
     */
    public function profile()
    {
        return view('user.profile');
    }

    /**
     * Show edit profile form
     */
    public function editProfile()
    {
        return view('user.edit-profile');
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone'         => 'nullable|string|max:20|unique:users,phone,' . $user->id,
            'address'       => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Store new image
            $imagePath           = $request->file('profile_image')->store('profile-images', 'public');
            $user->profile_image = $imagePath;
        }

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
    }

    /**
     * Show user bookings
     */
    public function bookings()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.bookings', compact('bookings'));
    }

    /**
     * Show user orders
     */
    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.orders', compact('orders'));
    }

    /**
     * Show change password form
     */
    public function showChangePasswordForm()
    {
        return view('user.change-password');
    }

    /**
     * Update user password
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password'     => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        // Check if current password is correct
        if (! Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Password updated successfully');
    }

    public function contactSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName'  => 'nullable|string|max:255',
            'email'     => 'required|email|max:255',
            'message'   => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $contact = Contact::create([
            'firstName' => $request->firstName,
            'lastName'  => $request->lastName,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'message'    => $request->message,
        ]);

        if ($contact) {
            return redirect()->back()->with('success', 'Thank you for contacting us!');
        } else {
            return back()->withErrors(['error' => 'Failed to submit your contact request. Please try again later.'])->withInput();
        }
    }
}
