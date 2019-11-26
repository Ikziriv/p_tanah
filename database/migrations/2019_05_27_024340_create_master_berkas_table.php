<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_berkas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->string('logo_surat')->nullable();
            $table->string('nomor');
            $table->string('nama');
            $table->string('tmpt_tgl');
            $table->string('tgl');
            $table->string('tmpt');
            $table->string('nama_relasi');
            $table->string('jml_anak');
            $table->string('jml_sdr');
            $table->string('tgl_ubah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_berkas');
    }
}
