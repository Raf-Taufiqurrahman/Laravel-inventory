@extends('layouts.landing.master', ['title' => 'Homepage'])

@section('content')
    @include('layouts.landing.hero')
    <div class="w-full py-6 px-4">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                <div class="col-span-12 lg:col-span-8">
                    <div class="flex flex-col md:flex-row md:justify-between mb-5 gap-4">
                        <div class="flex flex-col">
                            <h1 class="text-gray-700 font-bold text-lg">Daftar Barang</h1>
                            <p class="text-gray-400 text-xs">
                                Kumpulan data barang yang berada di gudang
                            </p>
                        </div>
                        <form action="{{ route('product.index') }}" method="get">
                            <input
                                class="border text-sm rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-sky-700 text-gray-700 w-full"
                                placeholder="Cari Data Barang.." name="search" value="{{ $search }}" />
                        </form>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
                        @foreach ($products as $product)
                            <div class="relative bg-white p-4 rounded-lg border shadow-custom">
                                <img src="{{ $product->image }}" class="rounded-lg w-full object-cover" />
                                <div
                                    class="font-mono absolute -top-3 -right-3 p-2 {{ $product->quantity > 0 ? 'bg-green-700' : 'bg-rose-700' }} rounded-lg text-gray-50">
                                    {{ $product->quantity }}
                                </div>
                                <div class="flex flex-col gap-2 py-2">
                                    <div class="flex justify-between">
                                        <a href="{{ route('product.show', $product->slug) }}"
                                            class="text-gray-700 text-sm hover:underline">{{ $product->name }}</a>
                                        <div class="text-gray-500 text-sm">{{ $product->category->name }}</div>
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ Str::limit($product->description, 35) }}
                                    </div>
                                    @if ($product->quantity > 0)
                                        <form action="{{ route('cart.store', $product->slug) }}" method="POST">
                                            @csrf
                                            <button
                                                class="text-gray-700 bg-gray-200 p-2 rounded-lg text-sm text-center hover:bg-gray-300 w-full"
                                                type="submit">
                                                Tambah ke keranjang
                                            </button>
                                        </form>
                                    @else
                                        <button
                                            class="text-gray-700 bg-gray-200 p-2 rounded-lg text-sm text-center hover:bg-gray-300 w-full cursor-not-allowed">
                                            Barang Tidak Tersedia
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($product->count() >= 6)
                        <div class="mt-8 text-center flex justify-center">
                            <a href="{{ route('product.index') }}"
                                class="bg-gray-700 px-4 py-2 rounded-lg text-gray-50 flex items-center hover:bg-gray-900">
                                Lihat Semua Barang
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-right"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="7 7 12 12 7 17"></polyline>
                                    <polyline points="13 7 18 12 13 17"></polyline>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
                <div class="col-span-12 lg:col-span-4 row-start-1">
                    <div class="md:shadow-custom md:bg-white md:rounded-lg md:border">
                        <div class="flex flex-col p-4">
                            <h1 class="text-gray-700 font-bold text-lg">Daftar Kategori</h1>
                            <p class="text-gray-400 text-xs">Kumpulan data kategori yang berada di gudang</p>
                        </div>
                        <div class="p-4 flex flex-row gap-8 overflow-x-auto md:grid md:gird-cols-1 md:gap-2">
                            @foreach ($categories as $category)
                                <a href="{{ route('category.show', $category->slug) }}"
                                    class="p-2 flex flex-row items-center gap-4 rounded-lg bg-white border border-l-4 border-l-sky-700 hover:scale-105 duration-200 transition-transform min-w-full">
                                    <img src="{{ $category->image }}" alt="{{ $category->name }}"
                                        class="object-cover w-20 rounded-lg">
                                    <div>
                                        <h1 class="text-sm italic text-gray-700">{{ $category->name }}</h1>
                                        <p class="text-xs text-gray-500">
                                            {{ $category->products->count() }} Produk
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
