@extends('layouts.master', ['title' => 'Dashboard'])

@section('content')
    <x-container>
        <div class="col-sm-6 col-xl-3">
            <x-widget title="Kategori" :subTitle="$categories" class="bg-azure">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="8" y="8" width="12" height="12" rx="2"></rect>
                    <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
                </svg>
            </x-widget>
        </div>
        <div class="col-sm-6 col-xl-3">
            <x-widget title="Supplier" :subTitle="$suppliers" class="bg-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="7" cy="17" r="2"></circle>
                    <circle cx="17" cy="17" r="2"></circle>
                    <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                </svg>
            </x-widget>
        </div>
        <div class="col-sm-6 col-xl-3">
            <x-widget title="Barang" :subTitle="$products" class="bg-indigo">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-loading" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M2 3h1a2 2 0 0 1 2 2v10a2 2 0 0 0 2 2h15"></path>
                    <rect x="9" y="6" width="10" height="8" rx="3"></rect>
                    <circle cx="9" cy="19" r="2"></circle>
                    <circle cx="18" cy="19" r="2"></circle>
                </svg>
            </x-widget>
        </div>
        <div class="col-sm-6 col-xl-3">
            <x-widget title="Kendaraan" :subTitle="$vehicles" class="bg-purple">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-steering-wheel" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <circle cx="12" cy="12" r="2"></circle>
                    <line x1="12" y1="14" x2="12" y2="21"></line>
                    <line x1="10" y1="12" x2="3.25" y2="10"></line>
                    <line x1="14" y1="12" x2="20.75" y2="10"></line>
                </svg>
            </x-widget>
        </div>
        <div class="col-sm-6 col-xl-3">
            <x-widget title="Customer" :subTitle="$customers" class="bg-lime">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                </svg>
            </x-widget>
        </div>
        <div class="col-sm-6 col-xl-3">
            <x-widget title="Permintaan Barang" :subTitle="0" class="bg-green">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="6" cy="19" r="2"></circle>
                    <circle cx="17" cy="19" r="2"></circle>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l6.005 .429m7.138 6.573l-.143 .998h-13"></path>
                    <path d="M15 6h6m-3 -3v6"></path>
                </svg>
            </x-widget>
        </div>
        <div class="col-sm-6 col-xl-3">
            <x-widget title="Barang Keluar" :subTitle="$transactions" class="bg-cyan">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-x"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="6" cy="19" r="2"></circle>
                    <circle cx="17" cy="19" r="2"></circle>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l7.999 .571m5.43 4.43l-.429 2.999h-13"></path>
                    <path d="M17 3l4 4"></path>
                    <path d="M21 3l-4 4"></path>
                </svg>
            </x-widget>
        </div>
        <div class="col-sm-6 col-xl-3">
            <x-widget title="Barang Keluar Bulan ini" :subTitle="$transactionThisMonth" class="bg-teal">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-off"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="6" cy="19" r="2"></circle>
                    <path d="M17 17a2 2 0 1 0 2 2"></path>
                    <path d="M17 17h-11v-11"></path>
                    <path d="M9.239 5.231l10.761 .769l-1 7h-2m-4 0h-7"></path>
                    <path d="M3 3l18 18"></path>
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
                    <a href="" class="ml-1">Lihat Detail Permintaan</a>
                </div>
            @endif
        </div>
        <div class="col-12 col-lg-6">
            <x-card title="List Barang dengan stok kurang dari 10">
                <div class="list list-row list-hoverable">
                    @foreach ($productsOutStock as $product)
                        <div class="list-item">
                            <div>
                                <span class="badge bg-danger">{{ $product->quantity }}</span>
                            </div>
                            <div class="text-truncate">
                                <a href="{{ route('admin.stock.index') }}"
                                    class="text-body d-block">{{ $product->name }}</a>
                                <small class="d-block text-muted  mt-n1">
                                    Kategori : {{ $product->category->name }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
            <div class="d-flex justify-content-end">{{ $productsOutStock->links() }}</div>
        </div>
        <div class="col-lg-6">
            <x-card title="Chart Barang paling populer">
                <div id="chart-total-sales" class="my-3"></div>
            </x-card>
        </div>
    </x-container>
@endsection

@push('js')
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-total-sales'), {
                chart: {
                    type: "donut",
                    fontFamily: 'inherit',
                    height: 400,
                    sparkline: {
                        enabled: true
                    },
                    animations: {
                        enabled: true
                    },
                },
                fill: {
                    opacity: 1,
                },
                series: @json($total),
                labels: @json($label),
                grid: {
                    strokeDashArray: 4,
                },
                colors: ["#206bc4", "#79a6dc", "#bfe399", "#7891b3", "#2596be"],
                legend: {
                    show: true,
                    position: 'top'
                },
                tooltip: {
                    fillSeriesColor: true
                },
                dataLabels: {
                    enabled: true,
                },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    },
                    dynamicAnimation: {
                        enabled: true,
                        speed: 350
                    }
                }
            })).render();
        });
        // @formatter:on
    </script>
@endpush
