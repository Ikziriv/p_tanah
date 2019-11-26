<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penjual_id'); // Penjual
            $table->string('nama');
            $table->string('sppt');
            $table->string('gps');
            $table->string('luas_terbayar');
            $table->integer('desa_id'); // Letak OP
            $table->integer('blok_id'); // Kode Blok
            $table->integer('sppt_id'); // Kode SPT
            $table->string('nomer_sph'); 
            $table->string('tgl_sph'); 
            $table->integer('stat_id'); // Status Paid
            $table->boolean('s_ppjb')->default(0); 
            $table->boolean('s_sph')->default(0);
            $table->boolean('s_sppt')->default(0); 
            $table->boolean('ktp_penjual')->default(0);
            $table->boolean('ktp_lain')->default(0);  
            $table->boolean('s_kk')->default(0); 
            $table->boolean('s_jual')->default(0); 
            $table->boolean('s_sengketa')->default(0); 
            $table->boolean('s_riwayat_tanah')->default(0);  
            $table->boolean('s_persetujuan')->default(0); 
            $table->boolean('s_ket_menikah')->default(0); 
            $table->boolean('buku_nikah')->default(0); 
            $table->boolean('s_beda_nama')->default(0); 
            $table->boolean('s_beda_luas')->default(0);
            $table->boolean('s_kematian')->default(0);  
            $table->boolean('s_ahli_waris')->default(0);
            $table->boolean('s_kuasa_waris')->default(0); 
            $table->boolean('ktp_ahli_waris')->default(0); 
            $table->boolean('kk_ahli_waris')->default(0);
            $table->boolean('s_girik_hilang')->default(0); 
            $table->boolean('letter_c')->default(0);   
            $table->boolean('foto_transaksi')->default(0);
            $table->boolean('kwitansi_pembayaran')->default(0);  
            $table->boolean('gambar_situasi')->default(0); 
            $table->boolean('bap')->default(0); 
            $table->boolean('dhkp')->default(0); 
            $table->boolean('npwp')->default(0); 
            $table->string('notes')->default(0); 
            $table->string('nomer_bpn')->nullable(); 
            $table->string('tgl_bpn')->nullable();  
            $table->boolean('s_kuasa')->default(0);  
            $table->boolean('s_pengakuan_tanah')->default(0);  
            $table->boolean('s_kesepakatan_bersama')->default(0);
            $table->string('tgl_pembuatan');   
            $table->timestamps();
        });

        // Schema::create('tanah_desa', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('tanah_id');
        //     $table->integer('desa_id');
        //     $table->timestamps();
        // });

        // Schema::create('tanah_blok', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('tanah_id');
        //     $table->integer('blok_id');
        //     $table->timestamps();
        // });

        // Schema::create('tanah_sppt', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('tanah_id');
        //     $table->integer('sppt_id');
        //     $table->timestamps();
        // });

        // Schema::create('tanah_stat', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('tanah_id');
        //     $table->integer('stat_id');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanahs');
        // Schema::dropIfExists('tanah_desa');
        // Schema::dropIfExists('tanah_blok');
        // Schema::dropIfExists('tanah_sppt');
        // Schema::dropIfExists('tanah_stat');
    }
}
