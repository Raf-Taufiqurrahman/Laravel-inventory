@extends('layouts.frontend.master', ['title' => 'Product Detail'])

@section('content')
    <x-container>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="ribbon bg-red">{{ $product->category->name }}</div>
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                    <line x1="10" y1="12" x2="14" y2="12"></line>
                                </svg>
                                Stok Produk :
                                <span class="text-success">{{ $product->quantity }}</span>
                            </p>
                            <div class="row">
                                <div class="col-1">
                                    <x-input name="quantity" title="" type="number" placeholder="" value="" />
                                </div>
                                <div class="mt-2">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-shopping-cart mr-1"></i> Tambah Kekeranjang
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <img src="{{ $product->image }}" class="img-fluid rounded-lg" alt="{{ $product->name }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection
