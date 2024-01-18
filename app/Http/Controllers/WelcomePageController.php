<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    public function index()
    {
        $products = Product::getProductsWelcomePage();
        $newProducts = Product::getNewProductsWelcomePage();
        // search query
        $search = request()->query('search');
        if ($search) {
            $products = Product::where('product_name', 'LIKE', "%{$search}%")->get();
        }
        // dd($products->toArray());
        return view('welcomepage.welcomepage', [
            'products' => $products,
            'newProducts' => $newProducts
        ]);
    }
}
