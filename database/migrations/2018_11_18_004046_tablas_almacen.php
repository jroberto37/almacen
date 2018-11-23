<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablasAlmacen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('articulo',function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id_art');
            $table->string('nombre_art',32)->unique();
            $table->double('cant_art')->default(0.0);
            $table->double('exis_art')->default(0.0);
            $table->mediumText('desc_art');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('articulo');
    }
}
