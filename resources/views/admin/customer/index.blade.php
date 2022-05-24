@extends('layouts.master', ['title' => 'Customer'])

@section('content')
    <x-container>
        <div class="col-12">
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
                                <td>{{ $customer->email }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
    </x-container>
@endsection
