@extends('layouts.frontend.master', ['title' => 'ATK'])

@section('content')
    <div class="container-xl">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <h2 class="page-title font-weight-bold text-uppercase">
                        Daftar Barang
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('product.index') }}" method="GET">
                    <x-search name="search" :value="$search" />
                </form>
            </div>
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('product.show', $product->slug) }}" class="card card-stacked">
                        <div class="ribbon bg-red">{{ $product->category->name }}</div>
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <p class="text-muted">{{ $product->description }}</p>
                            <p class="text-muted"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-archive" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
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
    </div>
@endsection
