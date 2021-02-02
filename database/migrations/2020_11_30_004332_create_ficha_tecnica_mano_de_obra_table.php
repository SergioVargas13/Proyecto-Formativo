<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTecnicaManoDeObraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_tecnica_mano_de_obra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ficha_tecnica_id');
            $table->unsignedBigInteger('mano_de_obra_id');
            $table->foreign('ficha_tecnica_id')->references('id')->on('ficha_tecnicas');
            $table->foreign('mano_de_obra_id')->references('id')->on('mano_de_obras');
            $table->string('cantidad_tiempo');
            $table->string('tipoMO');
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
        Schema::dropIfExists('ficha_tecnica_mano_de_obra');
    }
}
