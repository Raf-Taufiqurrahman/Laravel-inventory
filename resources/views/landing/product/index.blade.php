@extends('layouts.landing.master', ['title' => 'Produk'])

@section('content')
    <div class="w-full py-6 px-4">
        <div class="container mx-auto">
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
    </div>
@endsection
