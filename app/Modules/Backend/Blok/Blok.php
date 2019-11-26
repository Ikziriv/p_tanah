<?php

namespace App\Modules\Backend\Blok;

use Illuminate\Database\Eloquent\Model;

class Blok extends Model
{
    protected $fillable = [
        'kode',
    ];

	public function tanah()
	{
		return $this->hasMany('App\Modules\Backend\Blok\Blok', 'id');
	}
}
