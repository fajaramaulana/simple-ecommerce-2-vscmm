<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthenticateController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('guest.login');
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

    public function register()
    {
        return view('guest.register');
    }

    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits_between:10,14|unique:users,phone',
        ],[
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.numeric' => 'Nomor telepon harus berupa angka',
            'phone.digits_between' => 'Nomor telepon minimal 10 dan maksimal 14 angka',
            'phone.unique' => 'Nomor telepon sudah terdaftar',
        ]);

        if ($validator->fails()) {
            return redirect('/register')->with('error', $validator->errors()->first());
        }

        $passwordRandom = $this->generateRandomString();

        // start transaction
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($passwordRandom),
                'role' => 'user',
            ]);

            // send to email
            Mail::to($request->email)->send(new RegisterMail($request->nama, $request->email, $passwordRandom));

            DB::commit();
            return redirect('/login')->with('success', 'Berhasil mendaftar');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('/register')->with('error', 'Gagal mendaftar');
        }       
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $randomString;
    }
    
}
