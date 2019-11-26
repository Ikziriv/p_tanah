<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('slug');
            $table->string('stat')->default(0);
            $table->timestamps();
        });

        Schema::create('berkas_tanah', function (Blueprint $table) {
            $table->integer('tanah_id');
            $table->integer('berkas_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas');
    }
}
