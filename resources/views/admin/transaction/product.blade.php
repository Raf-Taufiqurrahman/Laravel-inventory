@extends('layouts.master', ['title' => 'Barang Keluar'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="DAFTAR BARANG KELUAR" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Customer</th>
                            <th>Nama Produk</th>
                            <th>Kategori Produk</th>
                            <th>Kuantitas</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $i => $transaction)
                            <tr>
                                <td>{{ $i + $transactions->firstItem() }}</td>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->details[0]->product->name }}</td>
                                <td>{{ $transaction->details[0]->product->category->name }}</td>
                                <td>{{ $transaction->details[0]->quantity }}</td>
                                <td>{{ $transaction->details[0]->product->unit }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="font-weight-bold text-uppercase">
                                Total Barang Keluar
                            </td>
                            <td class="font-weight-bold text-danger text-right">
                                {{ $transactions->count() }} Barang ({{ $grandQuantity }} Kuantitas)
                            </td>
                        </tr>
                    </tbody>
                </x-table>
            </x-card>
            <div class="d-flex justify-content-end">{{ $transactions->links() }}</div>
        </div>
    </x-container>
@endsection
