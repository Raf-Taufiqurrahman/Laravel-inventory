@extends('layouts.master', ['title' => 'Permission'])

@section('content')
    <x-container>
        <div class="col-8">
            <x-card title="DAFTAR PERMISSION" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Permission</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $i => $permission)
                            <tr>
                                <td>{{ $i + $permissions->firstItem() }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <x-button-modal :id="$permission->id" title="" icon="edit" style=""
                                        class="btn btn-info" />
                                    <x-modal :id="$permission->id" title="Ubah Data">
                                        <form action="{{ route('admin.permission.update', $permission->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-input name="name" type="text" title="Permission" placeholder=""
                                                :value="$permission->name" />
                                            <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                                        </form>
                                    </x-modal>
                                    <x-button-delete :id="$permission->id" :url="route('admin.permission.destroy', $permission->id)" title=""
                                        class="btn btn-danger" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
            <div class="d-flex justify-content-end">{{ $permissions->links() }}</div>
        </div>
        <div class="col-4">
            <x-card title="TAMBAH PERMISSION" class="card-body">
                <form action="{{ route('admin.permission.store') }}" method="POST">
                    @csrf
                    <x-input name="name" type="text" title="Permission" placeholder="Permission" :value="old('name')" />
                    <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                </form>
            </x-card>
        </div>
    </x-container>
@endsection
