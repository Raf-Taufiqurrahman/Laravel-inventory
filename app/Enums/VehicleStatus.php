<?php

namespace App\Enums;

enum VehicleStatus : string {
    case Active = 'Tersedia';
    case Out    = 'Kendaraan Sedang Digunakan';
}
