<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Facultad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('CARRERA', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('CODIGO_FACULTAD');
            $table->string('DESCRIPCION');
            $table->integer('ESTADO');
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
        //
        Schema::drop('CARRERA');
    }
}
