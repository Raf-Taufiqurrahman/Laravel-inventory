<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Models\Product;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    use HasImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')->where('user_id', Auth::id())->paginate(10);

        $product = [];

        foreach($orders as $order){
            $product = Product::where('name', $order->name)->where('quantity', $order->quantity)->get();
        }

        return view('customer.order.index', compact('orders', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $this->uploadImage($request, $path = 'public/orders/', $name = 'image');

        Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'quantity' => $request->quantity,
            'image' => $image->hashName(),
            'unit' => $request->unit,
        ]);

        return back()->with('toast_success', 'Permintaan Barang Berhasil Diajukan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $image = $this->uploadImage($request, $path = 'public/orders/', $name = 'image');

        $order->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        if($request->file($name)){
            $this->updateImage(
                $path = 'public/orders/', $name = 'image', $data = $order, $url = $image->hashName()
            );
        }

        return back()->with('toast_success', 'Permintaan Barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        Storage::disk('local')->delete('public/orders/'. basename($order->image));

        return back()->with('toast_success', 'Permintaan Barang Berhasil Dihapus');
    }
}
