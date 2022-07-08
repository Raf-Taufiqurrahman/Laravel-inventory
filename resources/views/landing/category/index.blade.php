@extends('layouts.landing.master', ['title' => 'ATK - Kategori'])

@section('content')
    <div class="w-full py-6 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col">
                <h1 class="text-gray-700 font-bold text-lg">Daftar Kategori</h1>
                <p class="text-gray-400 text-xs">semua kategori yang kami sediakan</p>
            </div>
            <div class="py-5 md:w-3/12">
                <form action="{{ route('category.index') }}" method="GET">
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
                            placeholder="Cari kategori..." type="text" name="search" value="{{ $search }}" />
                    </label>
                </form>
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
        </div>
    </div>
@endsection
