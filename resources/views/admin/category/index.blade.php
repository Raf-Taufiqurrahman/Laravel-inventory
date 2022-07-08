@extends('layouts.master', ['title' => 'Kategori'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <form action="{{ route('admin.category.index') }}" method="GET">
                <x-search name="search" :value="$search" />
            </form>
            <x-card title="DAFTAR KATEGORI" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $i => $category)
                            <tr>
                                <td>{{ $i + $categories->firstItem() }}</td>
                                <td>
                                    <span class="avatar rounded avatar-md"
                                        style="background-image: url({{ $category->image }})"></span>
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @can('update-category')
                                        <x-button-modal :id="$category->id" title="" icon="edit" style=""
                                            class="btn btn-info btn-sm" />
                                        <x-modal :id="$category->id" title="Edit - {{ $category->name }}">
                                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <x-input name="name" type="text" title="Nama Kategori"
                                                    placeholder="Nama Kategori" :value="$category->name" />
                                                <x-input name="image" type="file" title="Foto Katagori" placeholder=""
                                                    :value="$category->image" />
                                                <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                                            </form>
                                        </x-modal>
                                    @endcan
                                    @can('delete-category')
                                        <x-button-delete :id="$category->id" :url="route('admin.category.destroy', $category->id)" title=""
                                            class="btn btn-danger btn-sm" />
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
            <div class="">{{ $categories->links() }}</div>
        </div>
        @can('create-category')
            <div class="col-12 col-lg-4">
                <x-card title="TAMBAH KATEGORI" class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input name="name" type="text" title="Nama Kategori" placeholder="Nama Kategori"
                            :value="old('name')" />
                        <x-input name="image" type="file" title="Foto Katagori" placeholder="" :value="old('image')" />
                        <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                    </form>
                </x-card>
            </div>
        @endcan
    </x-container>
@endsection
