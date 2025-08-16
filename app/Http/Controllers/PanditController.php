<?php

namespace App\Http\Controllers;

use App\Models\Pandit;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PanditController extends Controller
{
    // Show pandit dashboard
    public function dashboard()
    {
        $pandit = Auth::guard('pandit')->user();
        $bookings = Booking::where('pandit_id', $pandit->id)
            ->orderBy('ceremony_date', 'desc')
            ->take(5)
            ->get();

        return view('pandit.dashboard', compact('pandit', 'bookings'));
    }

    // Show pandit bookings
    public function bookings()
    {
        $pandit = Auth::guard('pandit')->user();
        $bookings = Booking::where('pandit_id', $pandit->id)
            ->orderBy('ceremony_date', 'desc')
            ->paginate(10);

        return view('pandit.bookings', compact('bookings'));
    }

    // Show pandit profile
    public function profile()
    {
        $pandit = Auth::guard('pandit')->user();
        return view('pandit.profile', compact('pandit'));
    }

    // Update pandit profile
    public function updateProfile(Request $request)
    {
        $pandit = Auth::guard('pandit')->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pandits,email,' . $pandit->id,
            'phone' => 'nullable|string|max:20',
            'specialization' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile-images', 'public');
            $validated['profile_image'] = $imagePath;
        }

        $pandit->update($validated);

        return redirect()->route('pandit.profile')->with('success', 'Profile updated successfully');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('panditlogin');
    }

    // Process login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('pandit')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('pandit.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Show registration form
    public function showRegistrationForm()
    {
        return view('panditregister');
    }

    // Process registration
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pandits',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $pandit = Pandit::create($validated);

        Auth::guard('pandit')->login($pandit);

        return redirect()->route('pandit.dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('pandit')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('homepage');
    }
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password'      => 'required',
            'new_password'          => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $pandit = Auth::guard('pandit')->user(); // if you have pandit guard

        if (!Hash::check($request->current_password, $pandit->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $pandit->password = Hash::make($request->new_password);
        $pandit->save();

        return back()->with('success', 'Password changed successfully.');
    }
    public function aa()
    {
        return view('pandit.aa');
    }
    public function home()
    {
        return view('newPandit.home');
    }
}
