<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CargaMasivaPreguntasProfesoresEstudiantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CARGA_PROFESOR_CURSO_ALUMNOS', function (Blueprint $table) {
            $table->increments('ID')->unique();
//            $table->string('TIPO',75)->unique();
//            $table->text('PREGUNTA')->nullable();
            $table->integer('CODIGO_CARRERA')->nullable();
            $table->string('NOMBRE_CARRERA',350);
            $table->integer('CODIGO_CURSO')->nullable();
            $table->string('NOMBRE_CURSO',350);
            $table->integer('CODIGO_CATEDRATICO')->nullable();
            $table->string('NOMBRE_CATEDRATICO',350);
            $table->string('CARNET',350);
            $table->string('NOMBRE_ALUMNO',350);
            $table->string('TOKEN',50);
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
