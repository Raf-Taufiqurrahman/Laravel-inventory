@extends('layouts.frontend.master', ['title' => 'ATK'])

@section('content')
    <x-container>
        <div class="col-12 col-md-12 col-lg-12">
            <form>
                <x-button-save title="Konfirmasi Pesanan" icon="check" class="btn bg-teal my-2 text-white" />
            </form>
            <x-card title="Keranjang" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 1%"></th>
                            <th>Produk</th>
                            <th>Deskripsi</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr>
                                <td>
                                    <x-button-delete :id="$cart->id" title="" :url="route('cart.destroy', $cart->id)" />
                                </td>
                                <td>{{ $cart->product->name }}</td>
                                <td>{{ $cart->product->description }}</td>
                                <td>
                                    {{ $cart->quantity }}
                                </td>
                                <td>
                                    <x-button-modal :id="$cart->id" icon="plus" style="" title="Ubah Kuantitas" />
                                    <x-modal :id="$cart->id" title="Ubah Kuantitas Produk">
                                        <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="text-right">Jumlah stok produk saat ini :
                                                <span class="badge bg-azure">{{ $cart->product->quantity }}</span>
                                            </div>
                                            <x-input type="number" title="Kuantitas Produk" name="quantity" placeholder=""
                                                :value="$cart->quantity" />
                                            <x-button-save title="Selesai" icon="check" class="btn btn-primary" />
                                        </form>
                                    </x-modal>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="font-weight-bold text-uppercase text-end">
                                Total
                            </td>
                            <td class="font-weight-bold text-end text-danger">
                                {{ $cart->count() }} Produk ({{ $grandQuantity }} Kuantitas)
                            </td>
                        </tr>
                    </tbody>
                </x-table>
            </x-card>
        </div>
    </x-container>
@endsection
