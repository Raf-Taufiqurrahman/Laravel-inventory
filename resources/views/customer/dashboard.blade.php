@extends('layouts.master', ['title' => 'Dashboard'])

@section('content')
    <x-container>
        <div class="col-sm-6 col-xl-6">
            <x-widget title="Permintaan Barang" :subTitle="$products->count()" class="bg-azure">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="8" y="8" width="12" height="12" rx="2"></rect>
                    <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                </svg>
            </x-widget>
        </div>
        {{-- <div class="col-sm-6 col-xl-4">
            <x-widget title="Peminjaman Kendaraan" :subTitle="$vehicles->count()" class="bg-azure">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="8" y="8" width="12" height="12" rx="2"></rect>
                    <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                </svg>
            </x-widget>
        </div> --}}
        <div class="col-sm-6 col-xl-6">
            <x-widget title="Transaksi" :subTitle="$transactions->count()" class="bg-azure">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="8" y="8" width="12" height="12" rx="2"></rect>
                    <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                </svg>
            </x-widget>
        </div>
        <div class="col-12">
            @if ($orders->count() == 0)
                <div class="alert alert-info d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle mr-2 fa-lg"></i>
                    Saat ini belum ada permintaan barang
                </div>
            @else
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle mr-2 fa-lg"></i>
                    Saat ini terdapat {{ $orders->count() }} permintaan barang menunggu konfirmasi.
                </div>
            @endif
        </div>
    </x-container>
@endsection
