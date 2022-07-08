@extends('layouts.landing.master', ['title' => 'ATK'])

@section('hero')
    @include('layouts.frontend.hero')
@endsection

@section('content')
    <div class="w-full py-6 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col">
                <h1 class="text-gray-700 font-bold text-lg">Daftar Kategori</h1>
                <p class="text-gray-400 text-xs">beberapa kategori yang kami sediakan</p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-6 gap-4 py-5">
                @foreach ($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}"
                        class="p-2 flex flex-row items-center gap-4 rounded-md bg-white hover:bg-sky-700 hover:text-white hover:scale-110 duration-300">
                        <img src="{{ $category->image }}" alt="{{ $category->name }}" class="object-cover w-10">
                        <h1 class="text-sm italic">{{ $category->name }}</h1>
                    </a>
                @endforeach
            </div>
            <div class="flex flex-col">
                <h1 class="text-gray-700 font-bold text-lg">Daftar Produk</h1>
                <p class="text-gray-400 text-xs">beberapa produk yang kami sediakan</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 pt-5 pb-20">
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
