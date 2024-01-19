<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('welcomepage.index');
        }
        $usersCount = User::where('role', 'user')->count();
        $usersActiveCount = User::where('role', 'user')->where('status', '1')->count();
        $productsCount = Product::count();
        $productsActiveCount = Product::where('status', '1')->count();

        $products = Product::orderBy('created_at', 'desc')->take(10)->get();

        return view('admin.dashboard', compact('usersCount', 'usersActiveCount', 'productsCount', 'productsActiveCount', 'products'));
    }

    public function users()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('welcomepage.index');
        }
        $users = User::where('role', 'user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function userCreatePost(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('welcomepage.index');
        }

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
            return redirect('/admin/users')->with('error', $validator->errors()->first());
        }

        // check if email or phone already registered
        $checkEmail = User::where('email', $request->email)->first();
        if ($checkEmail) {
            return redirect('/admin/users')->with('error', 'Email sudah terdaftar');
        }

        $checkPhone = User::where('phone', $request->phone)->first();
        if ($checkPhone) {
            return redirect('/admin/users')->with('error', 'Nomor telepon sudah terdaftar');
        }

        $passwordRandom = generateRandomString();

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
            // Mail::to($request->email)->send(new RegisterMail($request->nama, $request->email, $passwordRandom));

            DB::commit();
            return redirect('/admin/users')->with('success', 'Berhasil mendaftar');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('/admin/users')->with('error', 'Gagal mendaftar');
        }       
    }


    public function usersUpdate(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('welcomepage.index');
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|numeric|digits_between:10,14|unique:users,phone,'.$id,
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
            return redirect('/admin/users')->with('error', $validator->errors()->first());
        }

        // check if email or phone already registered
        $checkEmail = User::where('email', $request->email)->where('id', '!=', $id)->first();
        if ($checkEmail) {
            return redirect('/admin/users')->with('error', 'Email sudah terdaftar');
        }

        $checkPhone = User::where('phone', $request->phone)->where('id', '!=', $id)->first();
        if ($checkPhone) {
            return redirect('/admin/users')->with('error', 'Nomor telepon sudah terdaftar');
        }

        // start transaction
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            DB::commit();
            return redirect('/admin/users')->with('success', 'Berhasil mengubah data');
        } catch (\Throwable $th)
        {
            DB::rollback();
            return redirect('/admin/users')->with('error', 'Gagal mengubah data');
        }
    }
}
