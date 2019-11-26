<?php

namespace App\Modules\Backend\Desa;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $fillable = [
        'nama', 'slug',
    ];

	public function tanah()
	{
		return $this->hasMany('App\Modules\Backend\Desa\Desa', 'id');
	}
}
