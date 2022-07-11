@extends('layouts.landing.master', ['title' => 'Product Detail'])

@section('content')
    <div class="w-full py-6 px-4 pb-20 md:pb-0">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 md:mx-8 gap-4">
                <div class="row-span-2">
                    <img src="{{ $product->image }}" class="objec-cover w-full object-center rounded-lg">
                </div>
                <div class="bg-white border-2 border-red-500 rounded-lg p-4">
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
        </div>
    </div>
@endsection
