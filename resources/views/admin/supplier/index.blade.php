@extends('layouts.master', ['title' => 'Supplier'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <x-card title="DAFTAR SUPPLIER" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Supplier</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $i => $supplier)
                            <tr>
                                <td>{{ $i + $suppliers->firstItem() }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->telp }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>
                                    @can('update-supplier')
                                        <x-button-modal :id="$supplier->id" title="" icon="edit" style=""
                                            class="btn btn-info btn-sm" />
                                        <x-modal :id="$supplier->id" title="Edit - {{ $supplier->name }}">
                                            <form action="{{ route('admin.supplier.update', $supplier->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-input name="name" type="text" title="Nama Supplier"
                                                    placeholder="Nama Supplier" :value="$supplier->name" />
                                                <x-input name="telp" type="text" title="Telp Supplier"
                                                    placeholder="Telp Supplier" :value="$supplier->telp" />
                                                <x-input name="address" type="text" title="Alamat Supplier"
                                                    placeholder="Alamat Supplier" :value="$supplier->address" />
                                                <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                                            </form>
                                        </x-modal>
                                    @endcan
                                    @can('delete-supplier')
                                        <x-button-delete :id="$supplier->id" :url="route('admin.supplier.destroy', $supplier->id)" title=""
                                            class="btn btn-danger btn-sm" />
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
        @can('create-supplier')
            <div class="col-12 col-lg-4">
                <x-card title="TAMBAH SUPPLIER" class="card-body">
                    <form action="{{ route('admin.supplier.store') }}" method="POST">
                        @csrf
                        <x-input name="name" type="text" title="Nama Supplier" placeholder="Nama Supplier"
                            :value="old('name')" />
                        <x-input name="telp" type="text" title="Telp Supplier" placeholder="Telp Supplier"
                            :value="old('telp')" />
                        <x-input name="address" type="text" title="Alamat Supplier" placeholder="Alamat Supplier"
                            :value="old('address')" />
                        <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                    </form>
                </x-card>
            </div>
        @endcan
    </x-container>
@endsection
