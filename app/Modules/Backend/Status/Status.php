<?php

namespace App\Modules\Backend\Status;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'nama',
    ];

	public function tanah()
	{
		return $this->hasMany('App\Modules\Backend\Status\Status', 'id');
	}
}
