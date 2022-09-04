<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->latest()->get();

        $grandQuantity = $carts->sum('quantity');

        if($carts->count() > 0){
            return view('landing.cart.index', compact('carts', 'grandQuantity'));
        }
        return back()->with('toast_error', 'Keranjang anda kosong');
    }

    public function store(Product $product)
    {
        $user = Auth::user();

        $alreadyInCart = Cart::where('user_id', $user->id)->where('product_id', $product->id)->first();

        if($alreadyInCart){
            return back()->with('toast_error', 'Produk sudah ada didalam keranjang');
        }else{
            $user->carts()->create([
                'product_id' => $product->id,
                'quantity' => '1',
            ]);
            return redirect(route('cart.index'))
                ->with('toast_success', 'Produk berhasil ditambahkan keranjang');
        }
    }

    public function update(Request $request, Cart $cart)
    {
        $product = Product::whereId($cart->product_id)->first();

        if($product->quantity < $request->quantity){
            return back()->with('toast_error', 'Stok produk tidak mencukupi');
        }else{
            $cart->update([
                'quantity' => $request->quantity,
            ]);
            return back()->with('toast_success', 'Jumlah produk berhasil diubah');
        }
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        if($cart->count() >= 1){
            return back()->with('toast_success', 'Produk berhasil dikeluarkan dari keranjang');
        }else{
            return redirect(route('landing'))->with('toast_success', 'Keranjang anda kosong');
        }
    }

    public function order(Product $product)
    {
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->where('name', $product->name)->get();

        foreach($orders as $order){
            $item = Product::where('name', $order->name)->where('quantity', $order->quantity)->first();

            $order->update([
                'status' => OrderStatus::Done,
            ]);

            $user->carts()->create([
                'product_id' => $product->id,
                'quantity' => $item->quantity,
            ]);
        }

        return redirect(route('cart.index'))->with('toast_success', 'Produk berhasil ditambahkan keranjang');
    }
}
