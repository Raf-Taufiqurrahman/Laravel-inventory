@extends('layouts.master', ['title' => 'Customer'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-button-modal title="Tambah Customer" id="" icon="plus" style="mr-1" class="btn btn-primary mb-3" />
            <x-modal id="" title="Tambah Customer">
                <form action="{{ route('admin.customer.store') }}" method="POST">
                    @csrf
                    <x-input name="name" type="text" title="Nama Customer" placeholder="Nama Customer" :value="old('name')" />
                    <x-select title="Department" name="department">
                        <option value>Silahkan Pilih</option>
                        <option value="pkn">Pengelola Kekayaan Negara</option>
                        <option value="umum">Umum</option>
                        <option value="hi">Hukum dan Informasi</option>
                        <option value="Lelang">Lelang</option>
                        <option value="ki">Kepatuhan Internal</option>
                        <option value="pn">Piutang Negara</option>
                        <option value="penilaian">Penilaian</option>
                    </x-select>
                    <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                </form>
            </x-modal>
            <x-card title="DAFTAR CUSTOMER" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Customer</th>
                            <th>Department</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $i => $customer)
                            <tr>
                                <td>{{ $i + $customers->firstItem() }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->department }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
    </x-container>
@endsection
