@extends('layouts.landing.master', ['title' => 'Cart'])

@section('content')
    <div class="w-full py-6 px-4">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
                <div class="md:col-span-8">
                    <div class="border rounded-lg overflow-hidden">
                        <div class="bg-white border-b px-4 py-2.5 text-gray-700 font-medium flex items-center">
                            Keranjang anda
                        </div>
                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm text-left text-gray-500 divide-y divide-gray-200">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 w-0">#</th>
                                        <th scope="col" class="px-4 py-3">Nama Barang</th>
                                        <th scope="col" class="px-4 py-3 text-right">Jumlah</th>
                                        <th scope="col" class="px-4 py-3 w-0">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @forelse ($carts as $i=>$cart)
                                        <tr>
                                            <td class="py-3 px-4 whitespace-nowrap">
                                                <a href="#" class="text-rose-600"
                                                    onclick="deleteData({{ $cart->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-eraser" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                        </path>
                                                        <path
                                                            d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3">
                                                        </path>
                                                        <path d="M18 13.3l-6.3 -6.3"></path>
                                                    </svg>
                                                </a>
                                                <form id="delete-form-{{ $cart->id }}"
                                                    action="{{ route('cart.destroy', $cart->id) }}" method="POST"
                                                    style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap">
                                                {{ $cart->product->name }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap text-right">
                                                {{ $cart->quantity }} (qty)
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap text-right flex gap-2">
                                                <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input
                                                        class="w-16 border px-2 py-0.5 rounded focus:outline-none focus:ring-2 focus:ring-sky-600"
                                                        value="{{ $cart->quantity }}" type="number" name="quantity" />
                                                </form>
                                            </td>
                                        @empty
                                            <td class="py-3 px-4 whitespace-nowrap" colSpan="4">
                                                <div class="flex items-center justify-center h-96">
                                                    <div class="text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-shopping-cart inline"
                                                            width="32" height="32" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <circle cx="6" cy="19" r="2">
                                                            </circle>
                                                            <circle cx="17" cy="19" r="2">
                                                            </circle>
                                                            <path d="M17 17h-11v-14h-2"></path>
                                                            <path d="M6 5l14 1l-1 7h-13"></path>
                                                        </svg>
                                                        <div class="mt-5">
                                                            Keranjang Anda Kosong
                                                        </div>
                                                    </div>
                                                </div>
                                            </td class="py-3 px-4 whitespace-nowrap">
                                        </tr>
                                    @endforelse
                                    <tr className='bg-blue-50 text-blue-900 font-semibold'>
                                        <td class="py-3 px-4 whitespace-nowrap"></td>
                                        <td class="py-3 px-4 whitespace-nowrap">Total</td>
                                        <td class="py-3 px-4 whitespace-nowrap text-right text-teal-500">
                                            {{ $grandQuantity }} (Qty)
                                        </td>
                                        <td class="py-3 px-4 whitespace-nowrap"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-4" x-data="{ open: false }">
                    <form action="{{ route('transaction.store') }}" method="POST">
                        @csrf
                        <div class="border rounded-lg overflow-hidden">
                            <div class="bg-white border-b px-4 py-2.5 text-gray-700 font-medium flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-file-invoice mr-1" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                    </path>
                                    <line x1="9" y1="7" x2="10" y2="7"></line>
                                    <line x1="9" y1="13" x2="15" y2="13"></line>
                                    <line x1="13" y1="17" x2="15" y2="17"></line>
                                </svg>
                                Konfirmasi Pesanan
                            </div>
                            <div class="p-4 bg-white">
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-col gap-y-2">
                                        <label class="text-sm text-gray-700">
                                            Nama Lengkap
                                        </label>
                                        <input type="text"
                                            class="rounded-lg border p-2 text-sm text-gray-700 focus:outline-none bg-gray-200 cursor-not-allowed"
                                            placeholder="Rafi Taufiqurrahman" value="{{ Auth::user()->name }}"
                                            name="name" readonly />
                                    </div>
                                    <div class="flex flex-col gap-y-2">
                                        <label class="text-sm text-gray-700">
                                            Email
                                        </label>
                                        <input type="email"
                                            class="rounded-lg border p-2 text-sm text-gray-700 focus:outline-none bg-gray-200 cursor-not-allowed"
                                            placeholder="" value="{{ Auth::user()->email }}" name="email" readonly />
                                    </div>
                                    <div class="flex flex-col gap-y-2">
                                        <label class="text-sm text-gray-700">
                                            Divisi
                                        </label>
                                        <input type="email"
                                            class="rounded-lg border p-2 text-sm text-gray-700 focus:outline-none bg-gray-200 cursor-not-allowed"
                                            placeholder="" value="{{ Auth::user()->department }}" name="department"
                                            readonly />
                                    </div>
                                    <div class="flex flex-col gap-y-2">
                                        <label class="text-sm text-gray-700">
                                            Total Barang
                                        </label>
                                        <input type="text"
                                            class="rounded-lg border p-2 text-sm text-gray-700 focus:outline-none bg-gray-200 cursor-not-allowed"
                                            placeholder="" name="grand_total"
                                            value="{{ $cart->count() }} ({{ $grandQuantity }} Qty)" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <button class="text-white bg-sky-900 hover:bg-sky-800 rounded-lg w-full p-2" type="submit">
                                Order Sekarang
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
