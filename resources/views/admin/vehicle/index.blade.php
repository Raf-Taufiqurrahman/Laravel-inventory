@extends('layouts.master', ['title' => 'Kendaraan'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <x-card title="DAFTAR KENDARAAN" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Merek</th>
                            <th>Tipe</th>
                            <th>No.Polisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $i => $vehicle)
                            <tr>
                                <td>{{ $i + $vehicles->firstItem() }}</td>
                                <td>
                                    <span class="avatar rounded avatar-md"
                                        style="background-image: url({{ $vehicle->image }})"></span>
                                </td>
                                <td>{{ $vehicle->name }}</td>
                                <td>{{ $vehicle->merk }}</td>
                                <td>{{ $vehicle->type }}</td>
                                <td>{{ $vehicle->license_plat }}</td>
                                <td>
                                    @can('update-vehicle')
                                        <x-button-modal :id="$vehicle->id" title="" icon="edit" style=""
                                            class="btn btn-info btn-sm" />
                                        <x-modal :id="$vehicle->id" title="Edit - {{ $vehicle->name }}">
                                            <form action="{{ route('admin.vehicle.update', $vehicle->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <x-input name="name" type="text" title="Nama Kategori"
                                                    placeholder="Nama Kategori" :value="$vehicle->name" />
                                                <x-input name="merk" type="text" title="Merek Kendaraan"
                                                    placeholder="Merek Kendaraan" :value="$vehicle->merk" />
                                                <x-input name="type" type="text" title="Tipe Kendaraan"
                                                    placeholder="Tipe Kendaraan" :value="$vehicle->type" />
                                                <x-input name="license_plat" type="text" title="No. Polisi Kendaraan"
                                                    placeholder="No.Polisi Kendaraan" :value="$vehicle->license_plat" />
                                                <x-input name="image" type="file" title="Foto Katagori" placeholder=""
                                                    :value="$vehicle->image" />
                                                <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                                            </form>
                                        </x-modal>
                                    @endcan
                                    @can('delete-vehicle')
                                        <x-button-delete :id="$vehicle->id" :url="route('admin.vehicle.destroy', $vehicle->id)" title=""
                                            class="btn btn-danger btn-sm" />
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
        @can('create-vehicle')
            <div class="col-12 col-lg-4">
                <x-card title="TAMBAH KENDARAAN" class="card-body">
                    <form action="{{ route('admin.vehicle.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input name="name" type="text" title="Nama Kendaraan" placeholder="Nama Kendaraan"
                            :value="old('name')" />
                        <x-input name="merk" type="text" title="Merek Kendaraan" placeholder="Merek Kendaraan"
                            :value="old('merk')" />
                        <x-input name="type" type="text" title="Tipe Kendaraan" placeholder="Tipe Kendaraan"
                            :value="old('type')" />
                        <x-input name="license_plat" type="text" title="No. Polisi Kendaraan"
                            placeholder="No.Polisi Kendaraan" :value="old('license_plat')" />
                        <x-toggle name="condition" title="Kondisi Kendaraan" subTitle="Service" value="1" />
                        <x-input name="image" type="file" title="Foto Kendaraan" placeholder="" :value="old('image')" />
                        <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                    </form>
                </x-card>
            </div>
        @endcan
    </x-container>
@endsection
