@extends('layouts.master', ['title' => 'Kendaraan Keluar'])

@section('content')
    <x-container>
        <div class="col-12">
            <div class="d-flex justify-content-end align-items-center">
                <div>
                    <form action="{{ route('admin.transaction.vehicle') }}" method="GET">
                        <div class="input-icon mb-3">
                            <input type="text" class="form-control" placeholder="Search…" name="q"
                                value="{{ request()->q }}">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <circle cx="10" cy="10" r="7"></circle>
                                    <line x1="21" y1="21" x2="15" y2="15"></line>
                                </svg>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <x-card title="DAFTAR KENDARAAN KELUAR" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Customer</th>
                            <th>Nama Kendaraan</th>
                            <th>Waktu Keluar</th>
                            <th>Waktu Kembali</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rents as $i => $rent)
                            <tr>
                                <td>{{ $i + $rents->firstItem() }}</td>
                                <td>{{ $rent->user->name }}</td>
                                <td>{{ $rent->vehicle->name }}</td>
                                <td>{{ Carbon\Carbon::parse($rent->start_date)->format('d-m-Y (H:i:s a)') }}</td>
                                <td>
                                    {{ $rent->end_date != null ? Carbon\Carbon::parse($rent->end_date)->format('d-m-Y (H:i:sa)') : null }}
                                </td>
                                <td
                                    class="{{ $rent->status == App\Enums\RentStatus::Out ? 'text-danger' : 'text-success' }}">
                                    {{ $rent->status->value }}
                                </td>
                                <td>
                                    <x-button-modal :id="$rent->id" icon="info" style="" title=""
                                        class="btn btn-dark btn-sm" />
                                    <x-modal :id="$rent->id" title="Keperluan">
                                        <p>{{ $rent->requirement }}</p>
                                    </x-modal>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
            <div class="d-flex justify-content-end">{{ $rents->links() }}</div>
        </div>
    </x-container>
@endsection
