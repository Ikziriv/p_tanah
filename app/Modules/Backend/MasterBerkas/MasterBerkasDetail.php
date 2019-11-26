<?php

namespace App\Modules\Backend\MasterBerkas;

use Illuminate\Database\Eloquent\Model;

class MasterBerkasDetail extends Model
{
    protected $fillable = [
        'nomor_berkas',
        'nama_hub',
        'tgl_umur',
        'hubungan',
        'alamat',
    ];

    public function berkas() {
        return $this->belongsTo('App\Modules\Backend\MasterBerkas\MasterBerkas', 'nomor_berkas');
    }

    public function user() {
        return $this->belongsTo('App\User', 'nomor_berkas');
    }
}
