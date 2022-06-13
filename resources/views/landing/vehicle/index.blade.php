@extends('layouts.frontend.master', ['title' => 'ATK - Kategori'])

@section('content')
    <div class="container-xl">
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
    </div>
@endsection
