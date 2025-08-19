<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showUserRegister()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'nullable|string|max:15',
            'password' => 'required|string|min:6|confirmed',
            'terms'    => 'accepted',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'password'    => Hash::make($request->password),
            'role'        => 'user',     // 👈 Important
            'is_verified' => true,       // optional
            'is_active'   => true,
        ]);

        // Auto-login after registration
        auth()->login($user);

        return redirect()->route('user.dashboard')->with('success', 'User registered successfully!');
    }
    public function showLogin()
    {
        return view('auth.login'); // your login blade
    }

    public function login(Request $request)
    {
       
        $credentials = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',

        ])->validate();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
                // dd('Redirecting to admin dashboard');
            } elseif ($user->role === 'pandit') {
                return redirect()->route('pandit.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
