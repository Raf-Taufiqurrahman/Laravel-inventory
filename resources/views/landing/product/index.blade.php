@extends('layouts.landing.master', ['title' => 'ATK'])

@section('content')
    <div class="w-full py-6 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col">
                <h1 class="text-gray-700 font-bold text-lg">Daftar Produk</h1>
                <p class="text-gray-400 text-xs">semua produk yang kami sediakan</p>
            </div>
            <div class="py-5 md:w-3/12">
                <form action="{{ route('product.index') }}" method="GET">
                    <label class="relative block">
                        <span class="sr-only">Search</span>
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="10" cy="10" r="7"></circle>
                                <line x1="21" y1="21" x2="15" y2="15"></line>
                            </svg>
                        </span>
                        <input
                            class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                            placeholder="Cari produk..." type="text" name="search" value="{{ $search }}" />
                    </label>
                </form>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 pb-20">
                @foreach ($products as $product)
                    <a href="{{ route('product.show', $product->slug) }}"
                        class='bg-white shadow-lg rounded-lg relative border-2 border-red-500 hover:scale-105 duration-500'>
                        <img src="{{ $product->image }}" alt='articles' class='w-30 rounded-t-md object-cover' />
                        <div
                            class='text-sm absolute -top-5 -right-5 bg-white border-2 border-red-500 px-4 text-gray-800 rounded-md h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 '>
                            <img src="{{ $product->category->image }}" alt="{{ $product->name }}"
                                class="object-cover w-10">
                            <span>{{ $product->category->name }}</span>
                        </div>
                        <div class='py-4 px-6'>
                            <h1 class='font-bold text-base text-gray-700 text-center'>{{ $product->name }}
                            </h1>
                            <p class='font-semibold text-sm text-center text-gray-500 pt-2'>
                                {{ Str::limit($product->description, 80) }}
                            </p>
                            <div class='flex flex-row items-center text-center justify-center gap-2 mt-4'>
                                <p class='text-gray-500 text-xs flex items-center'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="3" y="4" width="18" height="4" rx="2">
                                        </rect>
                                        <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                        <line x1="10" y1="12" x2="14" y2="12"></line>
                                    </svg>Stok :
                                    {{ $product->quantity }} Produk
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
