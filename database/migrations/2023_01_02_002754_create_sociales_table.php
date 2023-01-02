<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sociales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('user_id');
            $table->bigIncrements('estatu_id');
            $table->bigIncrements('tipo');
            $table->bigIncrements('descripcion');
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
        Schema::dropIfExists('sociales');
    }
}
