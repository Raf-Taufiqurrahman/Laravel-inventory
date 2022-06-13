<?php

namespace App\Http\Controllers\Customer;

use App\Models\Rent;
use App\Models\Vehicle;
use App\Enums\RentStatus;
use App\Enums\VehicleStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();

        $rents = Rent::with('user', 'vehicle')->where('user_id', $user)->paginate(10);

        return view('customer.rent.index', compact('rents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Rent $rent)
    {
        $rent->update([
            'end_date' => now()->timezone('Asia/Kuala_Lumpur'),
            'status' => RentStatus::In,
        ]);

        Vehicle::whereId($rent->vehicle_id)->update([
            'status' => VehicleStatus::Active,
        ]);

        return back()->with('toast_success', 'Kendaraan Berhasil Dikembalikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
