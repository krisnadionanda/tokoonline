<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Halaman keranjang
    public function index()
    {
        $cart = session('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    // Tambah ke keranjang
    public function add($id)
{
    $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        // kalau produk sudah ada, pastikan quantity ada dulu
        $cart[$id]['quantity'] = ($cart[$id]['quantity'] ?? 0) + 1;
    } else {
        $imageUrl = $product->getFirstMediaUrl('products_image');

        $cart[$id] = [
            'product_id' => $product->id,
            'name'       => $product->name,
            'price'      => $product->price,
            'image'      => $imageUrl,
            'quantity'   => 1,
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
}

    // Hapus satu produk dari keranjang
    public function remove(Request $request)
    {
        $productId = $request->input('product_id');

        $cart = session('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Produk dihapus dari keranjang.');
    }

    // Kosongkan keranjang
    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('cart.index')
            ->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
