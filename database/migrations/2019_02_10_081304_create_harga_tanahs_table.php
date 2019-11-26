<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHargaTanahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_tanahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('harga');
            $table->string('keterangan');
            $table->boolean('status')->default(0)->nullable();
            $table->boolean('is_active')->default(0)->nullable();
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
        Schema::dropIfExists('harga_tanahs');
    }
}
