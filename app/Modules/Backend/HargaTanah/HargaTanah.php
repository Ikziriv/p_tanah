<?php

namespace App\Modules\Backend\HargaTanah;

use Illuminate\Database\Eloquent\Model;

class HargaTanah extends Model
{
    protected $fillable = [
        'harga', 'keterangan', 'status', 'is_active',
    ];
}
