<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('CURSOS', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('ID_FACULTAD');
            $table->integer('CODIGO_FACULTAD');
//            $table->integer('ID_CATEDRATICO');
            $table->integer('ESTADO');
            $table->string('DESCRIPCION');
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
        Schema::drop('CURSOS');
    }
}
