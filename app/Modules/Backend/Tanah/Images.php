<?php

namespace App\Modules\Backend\Tanah;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
	protected $table = 'berkas_images';

    protected $guarded = [];
    protected $fillable = [
        'image_path', 
    ];

    public function tanah()
    {
        return $this->belongsTo('App\Modules\Backend\Tanah\Tanah');
    }
}
