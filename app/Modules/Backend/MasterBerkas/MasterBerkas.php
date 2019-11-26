<?php

namespace App\Modules\Backend\MasterBerkas;

use Illuminate\Database\Eloquent\Model;

class MasterBerkas extends Model
{
    protected $fillable = [
        'kode',
        'nomor',
        'nama',
        'tmpt_tgl',
        'tgl',
        'tmpt',
        'nama_relasi',
        'jml_anak',
        'jml_sdr',
    ];

    public function histories() {
        return $this->hasMany('App\Modules\Backend\HistoryBerkas\HistoryBerkas');
    }

    public function details() {
        return $this->hasMany('App\Modules\Backend\MasterBerkas\MasterBerkasDetail');
    }
}
