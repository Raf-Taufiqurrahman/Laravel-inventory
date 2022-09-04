@extends('layouts.landing.master', ['title' => 'Product Detail'])

@section('content')
    <div class="w-full py-6 px-4 pb-20 md:pb-0">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 md:mx-8 gap-4 items-start mb-10">
                <div class="row-span-2">
                    <img src="{{ $product->image }}" class="objec-cover w-full object-center rounded-lg shadow-custom">
                </div>
                <div class="bg-white border shadow-custom rounded-lg p-4">
                    <p class="text-base text-gray-500">{{ $product->category->name }}</p>
                    <h1 class="font-bold text-2xl md:text-4xl text-gray-700">{{ $product->name }}</h1>
                    <div class="flex flex-col py-2">
                        <p class="text-base md:text-lg text-gray-600 py-2 text-justify">{{ $product->description }}</p>
                    </div>
                    <div class="py-2">
                        <h1 class="text-gray-600 text-sm">Informasi Produk</h1>
                        <div class="flex flex-row justify-between text-sm text-gray-500">
                            <p>Nama Supplier</p>
                            <p class="text-right">{{ $product->supplier->name }}</p>
                        </div>
                        <div class="flex flex-row justify-between text-sm text-gray-500">
                            <p>Alamat</p>
                            <p>{{ $product->supplier->address }}</p>
                        </div>
                        <div class="flex flex-row justify-between text-sm text-gray-500">
                            <p>No Telp</p>
                            <p>{{ $product->supplier->telp }}</p>
                        </div>
                        <div class="flex flex-row justify-between text-sm text-gray-500">
                            <p>Jumlah Transaksi</p>
                            <p>{{ $transaction->count() }} x (
                                {{ $transaction->sum('quantity') }} {{ $product->unit }})</p>
                        </div>
                        <div class="flex flex-row justify-between text-sm text-gray-500">
                            <p>Stok Produk</p>
                            <p>{{ $product->quantity }} {{ $product->unit }}</p>
                        </div>
                    </div>
                    <div class="py-2">
                        <form action="{{ route('cart.store', $product->slug) }}" method="POST">
                            @csrf
                            @if ($product->quantity > 0)
                                <button class="flex flex-row items-center bg-sky-700 p-2 rounded text-sm text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="6" cy="19" r="2"></circle>
                                        <circle cx="17" cy="19" r="2"></circle>
                                        <path d="M17 17h-11v-14h-2"></path>
                                        <path d="M6 5l14 1l-1 7h-13"></path>
                                    </svg>Tambahkan Keranjang
                                </button>
                            @else
                                <div class="bg-red-400 text-center text-white rounded p-2">
                                    <h4>Barang tidak Tersedia</h4>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex flex-col mb-5">
                <h1 class="text-gray-700 font-bold text-lg">Daftar Barang yang serupa</h1>
                <p class="text-gray-400 text-xs">Kumpulan data barang yang berada di gudang</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
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
        </div>
    @endsection
