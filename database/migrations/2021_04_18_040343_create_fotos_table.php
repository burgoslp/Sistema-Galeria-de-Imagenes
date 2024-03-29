<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('persona_id');
            $table->integer('coleccione_id')->nullable();
            $table->integer('estatu_id');
            $table->integer('categoria_id')->nullable();
            $table->integer('seccion_id')->nullable();
            $table->string('descripcion');
            $table->string('locacion');
            $table->string('fecha');
            $table->string('url');
            $table->softDeletes();
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
        Schema::dropIfExists('fotos');
    }
}
