@extends('layout')

@section('content')
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">

        {{-- HERO PRODUK UNGGULAN --}}
        @if ($featured)
            <div class="flex flex-col md:flex-row items-center bg-gradient-to-r from-indigo-50 to-white rounded-3xl shadow p-10 mb-16">
                <div class="md:w-1/2">
                    <p class="text-xs tracking-[0.2em] text-indigo-500 uppercase mb-2">
                        Produk Unggulan
                    </p>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        {{ $featured->product_name }}
                    </h1>
                    <p class="mb-4 text-gray-600">
                        Stok:
                        <span class="font-semibold">{{ $featured->quantity ?? 0 }}</span>
                        • Harga:
                        <span class="font-semibold">
                            Rp {{ number_format($featured->price, 0, ',', '.') }}
                        </span>
                    </p>
                    <div class="flex gap-4">
                        <a href="{{ url('/cart/add/'.$featured->id) }}"
                           class="px-6 py-2 rounded-full bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
                            Beli Sekarang
                        </a>
                        <a href="{{ route('produk.detail', $featured->id) }}"
                           class="px-6 py-2 rounded-full bg-white border border-indigo-200 text-indigo-600 hover:bg-indigo-50">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                    @php
                        $imageUrl = $featured->getFirstMediaUrl('products_image');
                    @endphp
                    <div class="w-72 h-72 rounded-full bg-white shadow-2xl flex items-center justify-center">
                        @if ($imageUrl)
                            <img src="{{ $imageUrl }}" alt="{{ $featured->product_name }}" class="max-h-64 object-contain">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <p class="mb-16 text-center text-gray-500">
                Belum ada produk. Tambahkan dulu lewat Filament admin.
            </p>
        @endif

        {{-- ANCHOR UNTUK MENU "DAFTAR PRODUK" --}}
        <div id="produk"></div>

        {{-- DAFTAR PRODUK --}}
        <h2 class="text-3xl font-bold mb-8 text-center">Daftar Produk</h2>

        <div class="grid gap-8 md:grid-cols-3">
            @forelse ($products as $product)
                <div class="bg-white rounded-2xl shadow p-4 flex flex-col">
                    @php
                        $img = $product->getFirstMediaUrl('products_image');
                    @endphp
                    <div class="h-48 flex items-center justify-center mb-4">
                        @if ($img)
                            <img src="{{ $img }}" alt="{{ $product->product_name }}" class="max-h-44 object-contain">
                        @else
                            <div class="w-32 h-32 bg-gray-100 flex items-center justify-center text-gray-400 text-sm rounded-xl">
                                No Image
                            </div>
                        @endif
                    </div>
                    <h3 class="font-semibold text-lg mb-1">{{ $product->product_name }}</h3>
                    <p class="text-sm text-gray-500 mb-2">
                        Harga: Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <p class="text-sm text-gray-500 mb-4">
                        {{ $product->product_description_short ?? '' }}
                    </p>
                    <div class="mt-auto flex justify-between gap-2">
                        <a href="{{ route('produk.detail', $product->id) }}"
                           class="text-indigo-600 text-sm font-medium hover:underline">
                            Lihat Detail
                        </a>
                        <a href="{{ url('/cart/add/'.$product->id) }}"
                           class="px-3 py-1 rounded-full bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700">
                            + Keranjang
                        </a>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">
                    Belum ada produk.
                </p>
            @endforelse
        </div>
    </div>
</section>
@endsection
