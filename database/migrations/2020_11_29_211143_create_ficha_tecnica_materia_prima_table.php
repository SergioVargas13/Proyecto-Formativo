<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTecnicaMateriaPrimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_tecnica_materia_prima', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ficha_tecnica_id');
            $table->unsignedBigInteger('materia_prima_id');
            $table->foreign('ficha_tecnica_id')->references('id')->on('ficha_tecnicas');
            $table->foreign('materia_prima_id')->references('id')->on('materia_primas');
            $table->integer('cantidad');
            $table->string('tipoMP');
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
        Schema::dropIfExists('ficha_tecnica_materia_prima');
    }
}
