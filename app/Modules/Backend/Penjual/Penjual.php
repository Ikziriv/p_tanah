<?php

namespace App\Modules\Backend\Penjual;

use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    protected $fillable = [
        'ktp', 'name', 'alamat', 'tlp', 'email',
    ];

	public function tanah()
	{
		return $this->hasMany('App\Modules\Backend\Penjual\Penjual', 'id');
	}
}
