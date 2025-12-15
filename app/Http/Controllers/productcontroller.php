<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    // tampilkan halaman detail produk
    public function detail($id)
{
    $product = Product::findOrFail($id);

    return view('home.product.detail', compact('product'));
}

}
