<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('welcomepage.index');
        }
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        foreach ($products as $key => $product) {
            $products[$key]->price = changeFormatRupiah($product->product_price);

        }
        return view('admin.products', compact('products'));
    }

    public function productCreatePost(Request $request)
    {
        
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('welcomepage.index');
        }

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|min:3|max:255',
            'product_price' => 'required|numeric',
            'product_image' => 'required|mimes:jpeg,png,jpg|max:2048',
        ],[
            'product_name.required' => 'Nama produk harus diisi',
            'product_name.min' => 'Nama produk minimal 3 karakter',
            'product_name.max' => 'Nama produk maksimal 255 karakter',
            'product_price.required' => 'Harga produk harus diisi',
            'product_price.numeric' => 'Harga produk harus berupa angka',
            'product_image.required' => 'Gambar produk harus diisi',
            // 'product_image.image' => 'Gambar produk harus berupa gambar',
            'product_image.mimes' => 'Gambar produk harus berupa gambar dengan format jpeg, png, atau jpg',
            'product_image.max' => 'Gambar produk maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/products')->with('error', $validator->errors()->first());
        }

        try {
            $imageName = generateRandomString() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('images'), $imageName);
    
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_image = $imageName;
            $product->status = 1;
            $product->save();
    
            return redirect('/admin/products')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect('/admin/products')->with('error', 'Terjadi kesalahan saat menambahkan produk ' . $th->getMessage());
        }

        
    }

    public function updateProduct(Request $request, $id) 
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('welcomepage.index');
        }

        $rules =  [
            'product_name' => 'required|min:3|max:255',
            'product_price' => 'required|numeric',
        ];

        $message = [
            'product_name.required' => 'Nama produk harus diisi',
            'product_name.min' => 'Nama produk minimal 3 karakter',
            'product_name.max' => 'Nama produk maksimal 255 karakter',
            'product_price.required' => 'Harga produk harus diisi',
            'product_price.numeric' => 'Harga produk harus berupa angka',
        ];

        if ($request->product_image) {
            $rules['product_image'] = 'mimes:jpeg,png,jpg|max:2048';
            $message['product_image.mimes'] = 'Gambar produk harus berupa gambar dengan format jpeg, png, atau jpg';
            $message['product_image.max'] = 'Gambar produk maksimal 2MB';
        }

        $validator = Validator::make($request->all(),$rules, $message);

        if ($validator->fails()) {
            return redirect('/admin/products')->with('error', $validator->errors()->first());
        }

        

        try {
            $product = Product::find($id);
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            if ($request->product_image) {
                $imageName = generateRandomString() . '.' . $request->product_image->extension();
                $request->product_image->move(public_path('images'), $imageName);
                $product->product_image = $imageName;
            }
            $product->save();
    
            return redirect('/admin/products')->with('success', 'Produk berhasil diubah');
        } catch (\Throwable $th) {
            return redirect('/admin/products')->with('error', 'Terjadi kesalahan saat mengubah produk ' . $th->getMessage());
        }
    }
}
