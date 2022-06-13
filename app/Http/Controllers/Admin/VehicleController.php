<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vehicle;
use App\Traits\HasImage;
use App\Enums\VehicleStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    use HasImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::paginate(10);
        return view('admin.vehicle.index', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $image = $this->uploadImage($request, $path = 'public/vehicles/', $name = 'image');

        Vehicle::create([
            'name' => $request->name,
            'image' => $image->hashName(),
            'type' => $request->type,
            'merk' => $request->merk,
            'license_plat' => $request->license_plat,
            'condition' => $request->condition ? 1 : 0,
            'status' => VehicleStatus::Active,
        ]);

        return back()->with('toast_success', 'Kendaraan Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $image = $this->uploadImage($request, $path = 'public/vehicels/', $name = 'image');

        $vehicle->update([
            'name' => $request->name,
            'type' => $request->type,
            'merk' => $request->merk,
            'license_plat' => $request->license_plat,
            'condition' => $request->condition ? 1 : 0,
        ]);

        if($request->file($name)){
            $this->updateImage(
                $path = 'public/vehicles/', $name = 'image', $data = $vehicle, $url = $image->hashName()
            );
        }

        return back()->with('toast_success', 'Kendaraan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        Storage::disk('local')->delete('public/vehicles/'. basename($vehicle->image));

        return back()->with('toast_success', 'Kendaraan Berhasil Dihapus');
    }
}
