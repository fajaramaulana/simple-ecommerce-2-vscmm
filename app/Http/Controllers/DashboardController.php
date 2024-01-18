<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
