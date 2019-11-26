<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterBerkasDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_berkas_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_berkas');
            $table->string('nama_hub');
            $table->string('tgl_umur');
            $table->string('hubungan');
            $table->string('alamat');
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
        Schema::dropIfExists('master_berkas_details');
    }
}
