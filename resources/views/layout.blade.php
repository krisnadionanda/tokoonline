<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tokoonline</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-gray-600">

<header class="text-gray-600 body-font shadow-sm">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{ route('home') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <span class="w-10 h-10 rounded-full bg-indigo-500 text-white flex items-center justify-center font-bold">
                T
            </span>
            <span class="ml-3 text-xl">Tailblocks</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center gap-6">
            <a href="{{ route('home') }}" class="hover:text-gray-900">Home</a>
            <a href="{{ route('home') }}#produk" class="hover:text-gray-900">Daftar Produk</a>
            <a href="#" class="hover:text-gray-900">Tentang</a>

            {{-- ICON KERANJANG --}}
            @php
                $cartCount = collect(session('cart', []))->sum('quantity');
            @endphp
            <a href="{{ route('cart.index') }}" class="relative inline-flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m5-9v9m4-9v9m4-9l2 9"/>
                </svg>
                @if ($cartCount > 0)
                    <span
                        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1 min-w-[18px] text-center">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>

            <a href="#"
               class="ml-4 inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base">
                Login
            </a>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

</body>
</html>
