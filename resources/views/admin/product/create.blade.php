@extends('layouts.master', ['title' => 'Produk'])

@section('content')
    <x-container>
        <div class="row">
            <div class="col-12">
                <x-card title="TAMBAH PRODUK" class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input name="name" type="text" title="Nama Produk" placeholder="Nama Produk" :value="old('name')" />
                        <x-input name="unit" type="text" title="Satuan Produk" placeholder="Satuan Produk"
                            :value="old('unit')" />
                        <x-select title="Supplier Produk" name="supplier_id">
                            <option value>Silahkan Pilih</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </x-select>
                        <x-select title="Kategori Produk" name="category_id">
                            <option value>Silahkan Pilih</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input name="image" type="file" title="Foto Produk" placeholder="" :value="old('image')" />
                        <x-textarea name="description" title="Deskripsi Produk" placeholder="Deskripsi Produk"></x-textarea>
                        <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                        <x-button-link title="Kembali" icon="arrow-left" :url="route('admin.product.index')" class="btn btn-dark"
                            style="mr-1" />
                    </form>
                </x-card>
            </div>
        </div>
    </x-container>
@endsection
