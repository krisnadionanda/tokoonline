@extends('layout')

@section('content')
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">

        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-8">
            {{-- ALERT SUKSES --}}
            <div class="mb-6">
                <div class="flex items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2l4 -4m5 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                    </svg>
                    <span>Pesanan kamu berhasil dibuat. Terima kasih sudah berbelanja! 🎉</span>
                </div>
            </div>

            {{-- HEADER --}}
            <div class="border-b border-gray-200 pb-4 mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">Detail Pesanan</h1>
                    <p class="text-sm text-gray-500">
                        Nomor Pesanan:
                        <span class="font-semibold text-gray-800">
                            #{{ $order->id }}
                        </span>
                    </p>
                </div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                             {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            {{-- DATA CUSTOMER --}}
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div>
                    <h2 class="text-sm font-semibold text-gray-700 mb-2">Data Pemesan</h2>
                    <p class="text-sm text-gray-800">{{ $order->customer_name ?? '-' }}</p>
                    <p class="text-sm text-gray-500">{{ $order->customer_email ?? '-' }}</p>
                    <p class="text-sm text-gray-500">{{ $order->customer_phone ?? '-' }}</p>
                </div>
                <div>
                    <h2 class="text-sm font-semibold text-gray-700 mb-2">Alamat Pengiriman</h2>
                    <p class="text-sm text-gray-800">
                        {{ $order->customer_address ?: '-' }}
                    </p>
                    <p class="text-xs text-gray-500 mt-2">
                        Tanggal pesanan:
                        {{ $order->created_at->format('d M Y H:i') }}
                    </p>
                </div>
            </div>

            {{-- LIST ITEM --}}
            <div class="mb-8">
                <h2 class="text-sm font-semibold text-gray-700 mb-3">Daftar Produk</h2>

                <div class="border border-gray-200 rounded-lg divide-y divide-gray-200">
                    @foreach ($order->orderItems as $item)
                        <div class="flex items-center justify-between px-4 py-3">
                            <div>
                                <p class="text-sm font-semibold text-gray-900">
                                    {{ $item->product_name }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    quantity: {{ $item->quantity }} x
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </p>
                            </div>
                            <p class="text-sm font-semibold text-gray-900">
                                Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- TOTAL --}}
            <div class="flex items-center justify-between border-t border-gray-200 pt-4 mb-8">
                <p class="text-lg font-bold text-gray-900">Total Pembayaran</p>
                <p class="text-lg font-bold text-gray-900">
                    Rp {{ number_format($order->total, 0, ',', '.') }}
                </p>
            </div>

            {{-- BUTTONS --}}
            <div class="flex flex-col md:flex-row gap-4">
                <a href="{{ route('home') }}"
                   class="w-full md:w-auto inline-flex justify-center items-center px-6 py-2 border border-gray-300
                          rounded-lg text-gray-700 hover:bg-gray-50">
                    Kembali ke Beranda
                </a>

                <a href="{{ route('produk.index') }}"
                   class="w-full md:w-auto inline-flex justify-center items-center px-6 py-2
                          bg-indigo-500 text-white rounded-lg hover:bg-indigo-600">
                    Lanjut Belanja
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
