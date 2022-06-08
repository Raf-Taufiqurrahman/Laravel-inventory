@extends('layouts.master', ['title' => 'Kendaraan Keluar'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="DAFTAR KENDARAAN KELUAR" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Customer</th>
                            <th>Nama Kendaraan</th>
                            <th>Waktu Keluar</th>
                            <th>Waktu Kembali</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rents as $i => $rent)
                            <tr>
                                <td>{{ $i + $rents->firstItem() }}</td>
                                <td>{{ $rent->user->name }}</td>
                                <td>{{ $rent->vehicle->name }}</td>
                                <td>{{ Carbon\Carbon::parse($rent->start_date)->format('d-m-Y (H:i:sa)') }}</td>
                                <td>
                                    {{ $rent->end_date != null ? Carbon\Carbon::parse($rent->end_date)->format('d-m-Y (H:i:sa)') : null }}
                                </td>
                                <td>{{ $rent->requirement }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
            <div class="d-flex justify-content-end">{{ $rents->links() }}</div>
        </div>
    </x-container>
@endsection
