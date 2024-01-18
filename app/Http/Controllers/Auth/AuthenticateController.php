<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticateController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('guestlogin.login');
    }

    public function loginPost(Request $request)
    {
        // Check if the input is a valid email or phone number
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        
        $validateEmailPhone = $fieldType === 'email' ? 'required|email' : 'required|numeric|digits_between:10,13';
        // Validate common credentials
        $credentials = $request->validate([
            'email' => $validateEmailPhone,
            'password' => 'required',
        ]);

        if ($fieldType === 'phone') {
            // If the input is a phone number, find the user by phone
            $user = User::where('phone', $request->email)->first();
            if (!$user) {
                return redirect('/login')->with('error', 'Invalid ' . $fieldType . ' or password.');
            }
            $credentials['email'] = $user->email;
        }

        // Authenticate based on the determined field type
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login')->with('error', 'Invalid ' . $fieldType . ' or password.');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();;
        Auth::logout();
        return redirect('/');
    }
}
