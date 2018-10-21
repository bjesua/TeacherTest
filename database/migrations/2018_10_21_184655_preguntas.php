<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Preguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('PREGUNTAS', function (Blueprint $table) {
            $table->increments('ID');
//            $table->string('TIPO',75)->unique();
            $table->text('PREGUNTA')->nullable();
            $table->integer('TIPO_COMPONENTE')->nullable();
            $table->integer('CUESTIONARIO')->nullable();
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
