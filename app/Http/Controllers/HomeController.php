<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Produk unggulan (ambil yang pertama saja)
        $featured = Product::first();

        // Semua produk untuk daftar produk
        $products = Product::all();

        return view('home.index', compact('featured', 'products'));
    }
}
