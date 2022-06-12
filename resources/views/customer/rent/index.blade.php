@extends('layouts.master', ['title' => 'Order'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="DAFTAR PENGEMBALIAN KENDARAAN" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kendaraan</th>
                            <th>Jam Keluar</th>
                            <th>Jam Kembali</th>
                            <th>Status</th>
                            <th>Keperluan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rents as $i => $rent)
                            <tr>
                                <td>{{ $i + $rents->firstItem() }}</td>
                                <td>{{ $rent->vehicle->name }}</td>
                                <td>{{ Carbon\Carbon::parse($rent->start_date)->format('d-m-Y / H:i:sa') }}</td>
                                <td>
                                    {{ $rent->end_date != null ? Carbon\Carbon::parse($rent->end_date)->format('d-m-Y / H:i:sa') : '-' }}
                                </td>
                                <td
                                    class="{{ $rent->status == App\Enums\RentStatus::Out ? 'text-danger' : 'text-success' }}">
                                    {{ $rent->status->value }}
                                </td>
                                <td>{{ $rent->requirement }}</td>
                                <td>
                                    @if ($rent->status == App\Enums\RentStatus::Out)
                                        <form action="{{ route('customer.rent.update', $rent->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <x-button-save title="Kembalikan" icon="check" class="btn btn-primary btn-sm" />
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
    </x-container>
@endsection
