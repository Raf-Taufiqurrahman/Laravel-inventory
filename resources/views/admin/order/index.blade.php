@extends('layouts.master', ['title' => 'Order'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="DAFTAR PERMINTAAN BARANG" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama Barang</th>
                            <th>Kuantitas</th>
                            <th>Satuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $i => $order)
                            <tr>
                                <td>{{ $i + $orders->firstItem() }}</td>
                                <td>
                                    <span class="avatar rounded avatar-md"
                                        style="background-image: url({{ $order->image }})"></span>
                                </td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->unit }}</td>
                                <td class="{{ $order->status == 0 ? 'text-danger' : 'text-success' }}">
                                    {{ $order->status == 0 ? 'Menunggu Konfirmasi' : 'Permintaan Diterima' }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <x-button-save title="Konfirmasi" icon="check" class="btn btn-primary btn-sm" />
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
    </x-container>
@endsection
