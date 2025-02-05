<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $fillable  = [
        'Nama_barang',
        'No_resi',
        'status',
        'quantity',
        'location',
    ];
}
