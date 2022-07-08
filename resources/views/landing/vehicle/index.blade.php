@extends('layouts.landing.master', ['title' => 'ATK - Kategori'])

@section('content')
    <div class="w-full py-6 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col">
                <h1 class="text-gray-700 font-bold text-lg">Daftar Kendaraan</h1>
                <p class="text-gray-400 text-xs">semua kendaraan yang kami sediakan</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 py-5">
                @foreach ($vehicles as $vehicle)
                    <div>
                        <img src="{{ $vehicle->image }}" alt="{{ $vehicle->name }}" class="object-cover w-full rounded-lg">
                        <div class="flex flex-col py-2">
                            <p class="text-gray-600 text-sm">{{ $vehicle->license_plat }}</p>
                            <h1 class="text-gray-700 font-bold">{{ $vehicle->name }}</h1>
                        </div>
                        <div class="flex justify-between items-center">
                            @if ($vehicle->status == App\Enums\VehicleStatus::Active)
                            @else
                                <div class="alert alert-danger">Kendaraan Tidak Tersedia</div>
                            @endif
                            <div x-data="{ open: false }">
                                <button @click="open = true" class="bg-sky-700 p-2 text-xs text-white">Pinjam
                                    Kendaraan
                                </button>
                                <div
                                    x-bind:class="absolute inset - 0 w - full h - full bg - black bg - opacity - 75 flex justify -
                                        center items - center">
                                    <div class="bg-white md:max-w-xl rounded-lg shadow-lg">
                                        <div class="px-6 py-4 border-b flex items-center justify-between">
                                            <div class="">title</div>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="p-6">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui eligendi dolorum
                                            maxime amet quia necessitatibus dicta cupiditate pariatur, dignissimos tenetur.
                                            Consectetur quibusdam inventore a ab facilis nostrum, expedita ut sint?
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="{{ $vehicle->status == App\Enums\VehicleStatus::Out ? 'text-xs text-red-500' : 'text-xs text-teal-500' }}">
                                {{ $vehicle->status == App\Enums\VehicleStatus::Out ? 'Kendaraan Sedang Di Pinjam' : 'Kendaraan Tersedia' }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
{{-- <div class="container-xl">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title font-weight-bold text-uppercase">
                    Daftar Kendaraan
                </h2>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($vehicles as $vehicle)
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-uppercase">{{ $vehicle->name }}</div>
                        <span class="avatar avatar-xl rounded my-3"
                            style="background-image: url({{ $vehicle->image }})"></span>
                        <ul class="list-unstyled lh-lg">
                            <li>{{ $vehicle->license_plat }}</li>
                            <span
                                class="badge {{ $vehicle->status == App\Enums\VehicleStatus::Out ? 'bg-danger' : 'bg-success' }}">
                                {{ $vehicle->status == App\Enums\VehicleStatus::Out ? 'Kendaraan Sedang Di Pinjam' : 'Kendaraan Tersedia' }}
                            </span>
                        </ul>
                        <div>
                            @if ($vehicle->status == App\Enums\VehicleStatus::Active)
                                <x-button-modal id="{{ $vehicle->id }}" icon="" style="" title="Pinjam"
                                    class="btn btn-primary btn-block" />
                            @else
                                <div class="alert alert-danger">Kendaraan Tidak Tersedia</div>
                            @endif
                        </div>
                    </div>
                    <x-modal id="{{ $vehicle->id }}" title="Detail Peminjaman Kendaraan">
                        <form action="{{ route('vehicle.store') }}" method="POST">
                            @csrf
                            <x-input name="vehicle_id" type="hidden" value="{{ $vehicle->id }}" title=""
                                placeholder="" />
                            <x-textarea title=" Keperluan" name="requirement"
                                placeholder="Contoh : Untuk perjalanan dinas">
                            </x-textarea>
                            <x-button-save title="Pinjam Sekarang" icon="check" class="btn btn-primary" />
                        </form>
                    </x-modal>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}
