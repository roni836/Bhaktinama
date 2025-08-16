<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Service;
use App\Models\blog;
use App\Models\Temple;
use App\Models\Product;


class UserController extends Controller
{
    function index()
    {
        return view("welcome");
    }

    function services()
    {
        $data['services']=Service::all();
        return view("services",$data);
    }
    function shop()
    {
          $data['shop']=Product::all();
        return view("shop",$data, $data);
    }
    function about() {
        return view("about");
    }
    function blog() {
        $data['blog']=Blog::all();
        return view("blog",$data);
    }
    function contact() {
        return view("contact");
    }
    function login() {
        return view("login");
    }
    function register() {
        return view("register");
    }
    function adminlogin() {
        return view("adminlogin");
    }

    function panditlogin() {
        return view("panditlogin");
    }
    function panditregister() {
        return view("panditregister");
    }
     function bookpandit() {
        $data['bookpandit']=Service::all();
        return view("bookpandit",$data);
    }
     function astrology() {
      
        return view("astrology");
    }
     function temple() {
        $data['temple']=Temple::all();
        return view("temple",$data);
    }
     function kundalini() {
       
        return view("kundalini");
    }
     function aa() {
       
        return view("aa");
    }

    function annaprashan() {
        return view("annaprashan");
    }
    
    // User Authentication Methods
    
    /**
     * Handle user login request
     */
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_phone' => 'required|string',
            'password' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        // Check if input is email or phone
        $loginField = filter_var($request->email_phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        
        $credentials = [
            $loginField => $request->email_phone,
            'password' => $request->password
        ];
        
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'email_phone' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
    
    /**
     * Handle user registration request
     */
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email_phone' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        // Check if input is email or phone
        $isEmail = filter_var($request->email_phone, FILTER_VALIDATE_EMAIL);
        
        // Create user
        $user = new User();
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20|unique:users,phone,' . $user->id,
            'address' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            
            // Store new image
            $imagePath = $request->file('profile_image')->store('profile-images', 'public');
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
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $user = Auth::user();
        
        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
        
        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();
        
        return redirect()->route('user.profile')->with('success', 'Password updated successfully');
    }
}
