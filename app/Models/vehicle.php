<?php

namespace App\Models;

use App\Models\Rent;
use App\Traits\HasSlug;
use App\Enums\VehicleStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = [];

    protected $casts = [
        'status' => VehicleStatus::class
    ];

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => asset('storage/vehicles/' . $image),
        );
    }
}
