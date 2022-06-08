@extends('layouts.master', ['title' => 'Transaksi'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="DAFTAR TRANSAKSI" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
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
                                <td>{{ $transaction->transaction->invoice }}</td>
                                <td>{{ $transaction->product->name }}</td>
                                <td>{{ $transaction->product->category->name }}</td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>{{ $transaction->product->unit }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="font-weight-bold text-uppercase">
                                Total Transaksi
                            </td>
                            <td class="font-weight-bold text-danger text-right">
                                {{ $grandTransaction }} Barang ({{ $grandQuantity }} Kuantitas)
                            </td>
                        </tr>
                    </tbody>
                </x-table>
            </x-card>
            <div class="d-flex justify-content-end">{{ $transactions->links() }}</div>
        </div>
    </x-container>
@endsection
