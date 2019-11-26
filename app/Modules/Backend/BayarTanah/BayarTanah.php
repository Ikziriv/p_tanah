<?php

namespace App\Modules\Backend\BayarTanah;

use Illuminate\Database\Eloquent\Model;

class BayarTanah extends Model
{
    protected $fillable = [
        'tanah_id', 'rp_terbayar', 'rp_blm_terbayar', 'tgl_pembuatan',
    ];

	public function tanah() {
	    return $this->belongsTo('App\Modules\Backend\Tanah\Tanah', 'tanah_id');
	}
}
