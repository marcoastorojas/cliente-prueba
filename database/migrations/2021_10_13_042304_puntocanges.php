<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Puntocanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntocanges', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('localpersona_id')->unsigned();
            $table->bigInteger('persona_id')->unsigned();
            $table->string('tipopunto');
            $table->float('monto', 10,2);
            $table->integer('puntos');
            $table->timestamps();
            $table->foreign('localpersona_id')->references('id')->on('localpersonas')
                ->onUpdate('cascade');
            $table->foreign('persona_id')->references('id')->on('personas')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntocanges');
    }
}
