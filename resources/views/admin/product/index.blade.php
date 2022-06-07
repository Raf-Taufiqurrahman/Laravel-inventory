@extends('layouts.master', ['title' => 'Produk'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-button-link title="Tambah Produk" icon="plus" class="btn btn-primary mb-3" style="mr-1" :url="route('admin.product.create')" />
            <x-card title="DAFTAR PRODUK" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Nama Supplier</th>
                            <th>Kategori Produk</th>
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
                                    <x-button-modal :id="$product->id" icon="info" style="" title=""
                                        class="btn btn-success" />
                                    <x-modal :id="$product->id" title="Detail - {{ $product->name }}">
                                    </x-modal>
                                    <x-button-link title="" icon="edit" class="btn btn-info" :url="route('admin.product.edit', $product->id)" style="" />
                                    <x-button-delete :id="$product->id" :url="route('admin.product.destroy', $product->id)" title="" class="btn btn-danger" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
    </x-container>
@endsection
