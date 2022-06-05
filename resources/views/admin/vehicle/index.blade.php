@extends('layouts.master', ['title' => 'Kendaraan'])

@section('content')
    <x-container>
        <div class="col-8">
            <x-card title="DAFTAR KENDARAAN" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Merk</th>
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
                                <td>
                                    <x-button-modal :id="$vehicle->id" title="" icon="edit" style="" class="btn btn-info" />
                                    <x-modal :id="$vehicle->id" title="Edit - {{ $vehicle->name }}">
                                        <form action="{{ route('admin.vehicle.update', $vehicle->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <x-input name="name" type="text" title="Nama Kategori"
                                                placeholder="Nama Kategori" :value="$vehicle->name" />
                                            <x-input name="image" type="file" title="Foto Katagori" placeholder=""
                                                :value="$vehicle->image" />
                                            <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                                        </form>
                                    </x-modal>
                                    <x-button-delete :id="$vehicle->id" :url="route('admin.vehicle.destroy', $vehicle->id)" title="" class="btn btn-danger" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
        <div class="col-4">
            <x-card title="TAMBAH KENDARAAN" class="card-body">
                <form action="{{ route('admin.vehicle.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-input name="name" type="text" title="Nama Kategori" placeholder="Nama Kategori" :value="old('name')" />
                    <x-input name="image" type="file" title="Foto Katagori" placeholder="" :value="old('image')" />
                    <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                </form>
            </x-card>
        </div>
    </x-container>
@endsection
