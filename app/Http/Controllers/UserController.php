<?php
namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Order;
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
