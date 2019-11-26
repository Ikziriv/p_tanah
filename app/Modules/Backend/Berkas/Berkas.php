<?php

namespace App\Modules\Backend\Berkas;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $fillable = [
        'nama', 'slug', 'stat',
    ];
}
