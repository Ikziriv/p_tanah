<?php

namespace App\Modules\Backend\RuangDiskusi;

use Illuminate\Database\Eloquent\Model;

class RuangDiskusi extends Model
{
    protected $fillable = [
        'user_id', 'text'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
