<?php

namespace App\Modules\Backend\HistoryBerkas;

use Illuminate\Database\Eloquent\Model;

class HistoryBerkas extends Model
{
    protected $fillable = [
        'user_id',
        'deskripsi',
        'nomor_berkas',
    ];

    public function berkas() {
        return $this->belongsTo('App\Modules\Backend\MasterBerkas\MasterBerkas', 'nomor_berkas');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
