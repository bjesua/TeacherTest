<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsignaPreguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ASIGNA_PREGUNTAS', function (Blueprint $table) {
            $table->increments('ID');
//            $table->string('TIPO',75)->unique();
//            $table->text('PREGUNTA')->nullable();
            $table->integer('CUESTIONARIO')->nullable();
            $table->integer('CODIGO_CATEDRATICO')->nullable();
            $table->date('FECHA_INICIO');
            $table->date('FECHA_FIN');
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
    }
}
