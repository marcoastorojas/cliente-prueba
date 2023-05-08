<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Localpersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localpersonas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('persona_id')->unsigned();
            $table->bigInteger('local_id')->unsigned();
            $table->integer('totpuntos');
            $table->timestamps();
            $table->foreign('persona_id')->references('id')->on('personas')
                ->onUpdate('cascade');
            $table->foreign('local_id')->references('id')->on('locales')
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
        Schema::dropIfExists('localpersonas');
    }
}
