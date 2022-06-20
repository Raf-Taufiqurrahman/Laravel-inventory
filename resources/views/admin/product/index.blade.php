@extends('layouts.master', ['title' => 'Barang'])

@section('content')
    <x-container>
        <div class="col-12">
            @can('create-product')
                <x-button-link title="Tambah Barang" icon="plus" class="btn btn-primary mb-3" style="mr-1" :url="route('admin.product.create')" />
            @endcan
            <x-card title="DAFTAR BARANG" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama Barang</th>
                            <th>Nama Supplier</th>
                            <th>Kategori Barang</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $i => $product)
                            <tr>
                                <td>{{ $i + $products->firstItem() }}</td>
                                <td>
                                    <span class="avatar rounded avatar-md"
                                        style="background-image: url({{ $product->image }})"></span>
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->supplier->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->unit }}</td>
                                <td>
                                    @can('update-product')
                                        <x-button-link title="" icon="edit" class="btn btn-info btn-sm"
                                            :url="route('admin.product.edit', $product->id)" style="" />
                                    @endcan
                                    @can('delete-product')
                                        <x-button-delete :id="$product->id" :url="route('admin.product.destroy', $product->id)" title=""
                                            class="btn btn-danger btn-sm" />
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
    </x-container>
@endsection
