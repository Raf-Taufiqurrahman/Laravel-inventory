@extends('layouts.master', ['title' => 'User'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="DAFTAR USER" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                            <tr>
                                <td>{{ $i + $users->firstItem() }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->department }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td>
                                    <x-button-modal :id="$user->id" title="" icon="edit" style=""
                                        class="btn btn-info btn-sm" />
                                    <x-modal :id="$user->id" title="Ubah Data">
                                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-input name="name" type="text" title="Ubah Data" placeholder=""
                                                :value="$user->name" />
                                            <x-select title="Role" name="role">
                                                <option value="">Silahkan Pilih</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" @selected($user->roles()->find($role->id))>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </x-select>
                                            <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                                        </form>
                                    </x-modal>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
    </x-container>
@endsection
