<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Catedratico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('CATEDRATICO', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('ID_FACULTAD');
            $table->integer('ID_CURSO');
            $table->integer('CODIGO_CATEDRATICO');
            $table->string('NOMBRE');
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
        Schema::drop('CATEDRATICO');
    }
}
