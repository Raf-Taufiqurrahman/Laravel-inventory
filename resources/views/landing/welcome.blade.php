@extends('layouts.frontend.master', ['title' => 'ATK'])

@section('hero')
    @include('layouts.frontend.hero')
@endsection

@section('content')
    <div class="container-xl">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="d-flex justify-content-between">
                    <h2 class="page-title font-weight-bold text-uppercase">
                        Daftar Kategori
                    </h2>
                    @if ($categories->count() == 12)
                        <a href="{{ route('category.index') }}" class="text-decoration-underline">
                            Lihat Lebih banyak
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-6 col-lg-2">
                    <a class="card card-sm border-0 rounded-lg" href="{{ route('category.show', $category->slug) }}">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar rounded"
                                        style="background-image: url({{ $category->image }})"></span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $category->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <h2 class="page-title font-weight-bold text-uppercase my-3">
                Daftar Barang
            </h2>
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('product.show', $product->slug) }}" class="card card-stacked">
                        <div class="ribbon bg-red">{{ $product->category->name }}</div>
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <p class="text-muted">{{ Str::limit($product->description, 40) }}</p>
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
            @if ($products->count() == 9)
                <div class="col-12 d-flex justify-content-center my-2">
                    <a href="{{ route('product.index') }}" class="btn btn-dark">Lihat Lebih Banyak</a>
                </div>
            @endif
        </div>
    </div>
@endsection
