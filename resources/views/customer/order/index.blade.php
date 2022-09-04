@extends('layouts.master', ['title' => 'Order'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
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
                                <td
                                    class="{{ $order->status == App\Enums\OrderStatus::Pending ? 'text-danger' : 'text-success' }}">
                                    {{ $order->status->value }}
                                </td>
                                <td>
                                    @if ($order->status == App\Enums\OrderStatus::Pending)
                                        <x-button-modal :id="$order->id" title="" icon="edit" style=""
                                            class="btn btn-info btn-sm" />
                                        <x-modal :id="$order->id" title="Ubah Data">
                                            <form action="{{ route('customer.order.update', $order->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <x-input name="image" type="file" title="Foto Barang" placeholder=""
                                                    :value="$order->image" />
                                                <x-input name="name" type="text" title="Nama Barang"
                                                    placeholder="Nama Barang" :value="$order->name" />
                                                <x-input name="quantity" type="number" title="Kuantitas"
                                                    placeholder="Kuantitas" :value="$order->quantity" />
                                                <x-input name="unit" type="text" title="Satuan" placeholder="Satuan"
                                                    :value="$order->unit" />
                                                <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                                            </form>
                                        </x-modal>
                                        <x-button-delete :id="$order->id" :url="route('customer.order.destroy', $order->id)" title=""
                                            class="btn btn-danger btn-sm" />
                                    @elseif($order->status == App\Enums\OrderStatus::Success)
                                        <form action="{{ route('cart.order', $product[0]->slug) }}" method="POST">
                                            @csrf
                                            <x-button-save title="Tambahkan Keranjang" icon="shopping-cart"
                                                class="btn btn-primary btn-sm" />
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </x-card>
        </div>
        <div class="col-lg-4 col-12">
            <x-card title="TAMBAH PERMINTAAN BARANG" class="card-body">
                <form action="{{ route('customer.order.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-input name="image" type="file" title="Foto Barang" placeholder="" :value="old('image')" />
                    <x-input name="name" type="text" title="Nama Barang" placeholder="Nama Barang"
                        :value="old('name')" />
                    <x-input name="quantity" type="number" title="Kuantitas" placeholder="Kuantitas" :value="old('quantity')" />
                    <x-input name="unit" type="text" title="Satuan" placeholder="Satuan" :value="old('unit')" />
                    <x-button-save title="Simpan" icon="save" class="btn btn-primary" />
                </form>
            </x-card>
        </div>
    </x-container>
@endsection
