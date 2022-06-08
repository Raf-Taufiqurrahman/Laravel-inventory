@extends('layouts.master', ['title' => 'Role'])

@section('content')
    <x-container>
        <div class="col-7">
            <x-card title="DAFTAR ROLE" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $i => $role)
                            <tr>
                                <td>{{ $i + $roles->firstItem() }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <li>{{ $permission->name }}</li>
                                    @endforeach
                                </td>
                                <td>
                                    <x-button-modal :id="$role->id" title="" icon="edit" style=""
                                        class="btn btn-sm btn-info" />
                                    <x-modal :id="$role->id" title="Ubah Data">
                                        <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-input name="name" type="text" title="Role" placeholder=""
                                                :value="$role->name" />
                                            <x-select-group title="Permission">
                                                @foreach ($permissions as $permission)
                                                    <label class="form-selectgroup-item">
                                                        <input type="checkbox" name="permissions[]"
                                                            value="{{ $permission->id }}" class="form-selectgroup-input"
                                                            @checked($role->permissions()->find($permission->id))>
                                                        <span class="form-selectgroup-label">
                                                            {{ $permission->name }}
                                                        </span>
                                                    </label>
                                                @endforeach
                                            </x-select-group>
                                            <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                                        </form>
                                    </x-modal>
                                    <x-button-delete :id="$role->id" :url="route('admin.role.destroy', $role->id)" title=""
                                        class="btn btn-danger btn-sm" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
        <div class="col-5">
            <x-card title="TAMBAH ROLE" class="card-body">
                <form action="{{ route('admin.role.store') }}" method="POST">
                    @csrf
                    <x-input name="name" type="text" title="Role" placeholder="Role" :value="old('name')" />
                    <x-select-group title="Permission">
                        @foreach ($permissions as $permission)
                            <label class="form-selectgroup-item">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    class="form-selectgroup-input">
                                <span class="form-selectgroup-label">{{ $permission->name }}</span>
                            </label>
                        @endforeach
                    </x-select-group>
                    <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                </form>
            </x-card>
        </div>
    </x-container>
@endsection
