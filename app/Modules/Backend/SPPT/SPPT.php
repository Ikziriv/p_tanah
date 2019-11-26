<?php

namespace App\Modules\Backend\SPPT;

use Illuminate\Database\Eloquent\Model;

class SPPT extends Model
{
	protected $table = 'kode_sppts';

    protected $fillable = [
        'kode',
    ];

	public function tanah()
	{
		return $this->hasMany('App\Modules\Backend\SPPT\SPPT', 'id');
	}
}
