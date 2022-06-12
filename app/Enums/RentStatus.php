<?php

namespace App\Enums;

enum RentStatus : string {
    case Out  = 'Kendaraan Sedang Digunakan';
    case In   = 'Kendaraan Berhasil Dikembalikan';
}
