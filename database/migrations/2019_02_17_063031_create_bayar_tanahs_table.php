<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBayarTanahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar_tanahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tanah_id'); // Tanah
            $table->string('rp_terbayar')->nullable();  
            $table->string('rp_blm_terbayar')->nullable();  
            $table->string('tgl_pembuatan');   
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
        Schema::dropIfExists('bayar_tanahs');
    }
}
