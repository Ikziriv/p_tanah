<?php

namespace App\Modules\Backend\Tanah;

use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    protected $fillable = [
        'penjual_id',
        'nama', 
        'sppt', 
        'gps', 
        'luas_terbayar', 
        'desa_id', 
        'blok_id', 
        'sppt_id', 
        'nomer_sph', 
        'tgl_sph', 
        'stat_id', 
        'notes', 
        'nomer_bpn', 
        'tgl_bpn', 
        'tgl_pembuatan',
        's_ppjb', // TinyInt Type
        's_sph',
        's_sppt',
        'ktp_penjual',
        'ktp_lain',
        's_kk',
        's_jual',
        's_sengketa',
        's_riwayat_tanah',
        's_persetujuan',
        's_ket_menikah',
        'buku_nikah',
        's_beda_nama',
        's_beda_luas',
        's_kematian',
        's_ahli_waris',
        's_kuasa_waris',
        'ktp_ahli_waris',
        'kk_ahli_waris',
        's_girik_hilang',
        'letter_c',
        'foto_transaksi',
        'gambar_situasi',
        'kwitansi_pembayaran',
        'bap',
        'dhkp',
        'npwp',
        's_kuasa',
        's_pengakuan_tanah',
        's_kesepakatan_bersama',
    ];

    public function penjual() {
        return $this->belongsTo('App\Modules\Backend\Penjual\Penjual', 'penjual_id');
    }

	public function desa() {
	    return $this->belongsTo('App\Modules\Backend\Desa\Desa', 'desa_id');
	}

	public function blok() {
	    return $this->belongsTo('App\Modules\Backend\Blok\Blok', 'blok_id');
	}

	public function kodesppt() {
	    return $this->belongsTo('App\Modules\Backend\SPPT\SPPT', 'sppt_id');
	}

	public function status() {
	    return $this->belongsTo('App\Modules\Backend\Status\Status', 'stat_id');
	}

    public function images()
    {
        return $this->hasMany('App\Modules\Backend\Tanah\Images');
    }

    public function bayartanahs()
    {
        return $this->hasMany('App\Modules\Backend\BayarTanah\BayarTanah');
    }
}
