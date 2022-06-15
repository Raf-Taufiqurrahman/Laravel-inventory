@extends('layouts.frontend.master', ['title' => 'Product Detail'])

@section('content')
    <x-container>
        <div class="col-lg-8">
            <div class="card">
                <div class="list-group card-list-group">
                    <div class="list-group-item">
                        <div class="row row-sm align-items-center">
                            <div class="col-auto mr-4">
                                <img src="{{ $product->image }}" class="rounded" alt="{{ $product->name }}"
                                    width="80" height="80">
                            </div>
                            <div class="col">
                                {{ $product->name }}
                                <div class="text-muted">
                                    {{ $product->description }}
                                </div>
                                <div class="text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                                        <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                        <line x1="10" y1="12" x2="14" y2="12"></line>
                                    </svg>
                                    Stok Produk : <span
                                        class="badge {{ $product->quantity == 0 ? 'bg-danger' : 'bg-success' }}">{{ $product->quantity }}
                                        {{ $product->unit }}</span>
                                </div>
                            </div>
                            <div class="col-auto text-muted">
                                <form action="{{ route('cart.store', $product->slug) }}" method="POST">
                                    @csrf
                                    @if ($product->quantity > 0)
                                        <x-button-save title="Tambahkan Keranjang" icon="shopping-cart"
                                            class="btn btn-primary" />
                                    @else
                                        <button class="btn btn-danger" disabled>
                                            <i class="fas fa-times-circle mr-1"></i> Barang tidak tersedia
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Info Barang
                    </h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-5">Nama Supplier:</dt>
                        <dd class="col-7">{{ $product->supplier->name }}</dd>
                        <dt class="col-5">Alamat:</dt>
                        <dd class="col-7">{{ $product->supplier->address }}</dd>
                        <dt class="col-5">No Telp:</dt>
                        <dd class="col-7">{{ $product->supplier->telp }}</dd>
                        <dt class="col-5">Jumlah Transaksi Barang:</dt>
                        <dd class="col-7">
                            <span class="text-danger">
                                {{ $transaction->count() }} x (
                                {{ $transaction->sum('quantity') }} {{ $product->unit }})
                            </span>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h3 class="mb-3">Barang yang serupa</h3>
            <div class="row">
                @foreach ($products as $relatedProduct)
                    <a href="{{ route('product.show', $relatedProduct->slug) }}">
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <div class="row row-0">
                                    <div class="col-auto">
                                        <img src="{{ $relatedProduct->image }}" class="rounded-left" alt="Shape of You"
                                            width="88" height="88">
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            {{ $relatedProduct->name }}
                                            <div class="text-muted">
                                                {{ $relatedProduct->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </x-container>
@endsection
