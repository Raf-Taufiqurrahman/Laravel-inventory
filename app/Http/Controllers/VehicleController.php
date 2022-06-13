<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Vehicle;
use App\Enums\VehicleStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::get();

        return view('landing.vehicle.index', compact('vehicles'));

    }

    public function store(Request $request)
    {
        $vehicle = Rent::create([
            'user_id' => Auth::id(),
            'vehicle_id' => $request->vehicle_id,
            'requirement' => $request->requirement,
            'start_date' => now()->timezone('Asia/Kuala_Lumpur'),
        ]);

        Vehicle::whereId($vehicle->vehicle_id)->update([
            'status' => VehicleStatus::Out,
        ]);

        return back()->with('toast_success', 'Kendaraan Berhasil Dipinjam');
    }

}
