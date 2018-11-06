<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Respuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RESPUESTAS', function (Blueprint $table) {
            $table->increments('ID');
//            $table->integer('NUMERO_CARNET')->nullable();
            $table->string('NUMERO_CARNET',75)->unique();
            $table->integer('CODIGO_CURSO')->nullable();
            $table->integer('CODIGO_CATEDRATICO')->nullable();
            $table->integer('ID_PREGUNTA')->nullable();
//            $table->string('TIPO',75)->unique();
            $table->text('RESPUESTA')->nullable();
            $table->integer('OPCION1')->nullable();
            $table->integer('OPCION2')->nullable();
            $table->integer('OPCION3')->nullable();
            $table->integer('OPCION4')->nullable();
//            $table->integer('TIPO_COMPONENTE')->nullable();
//            $table->text('OPCIONES')->nullable();
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
