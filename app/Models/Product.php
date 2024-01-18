<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected  $fillable = [
        'product_name',
        'product_price',
        'product_image',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $table = 'products';

    public static function getProductsWelcomePage()
    {
        return self::where('status', 1)->select('id', 'product_name', 'product_price', 'product_image')->get();
    }

    public static function getNewProductsWelcomePage()
    {
        return self::where('status', 1)->select('id', 'product_name', 'product_price', 'product_image')->orderBy('created_at', 'desc')->limit(5)->get();
    }
}
