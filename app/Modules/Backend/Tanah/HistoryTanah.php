<?php

namespace App\Modules\Backend\Tanah;

use Illuminate\Database\Eloquent\Model;

class HistoryTanah extends Model
{
    protected $fillable = [
        'user_id',
        'deskripsi',
        'tanah_id',
    ];

    public function berkas() {
        return $this->belongsTo('App\Modules\Backend\Tanah\Tanah', 'tanah_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
