@extends('layouts.landing.master', ['title' => 'Kategori'])

@section('content')
    {{-- <div class="container-xl">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title font-weight-bold text-uppercase">
                        Daftar Produk Dengan Kategori : {{ $category->name }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('product.show', $product->slug) }}" class="card card-stacked">
                        <div class="ribbon bg-red">{{ $product->category->name }}</div>
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <p class="text-muted">{{ $product->description }}</p>
                            <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-archive" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                    <line x1="10" y1="12" x2="14" y2="12"></line>
                                </svg>
                                Stok Produk :
                                <span class="text-success">{{ $product->quantity }}</span>
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div> --}}
    <div class="w-full py-6 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col mb-5">
                <h1 class="text-gray-700 font-bold md:text-lg text-base">
                    Daftar Barang dengan kategori - {{ $category->name }}
                </h1>
                <p class="text-gray-400 text-xs">Kumpulan data barang dengan kategori - {{ $category->name }}</p>
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
