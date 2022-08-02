<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorizados', function (Blueprint $table) {

            $table->id();
            $table->foreignId(column:'colaborador');
            $table->foreignId(column:'modulo');


            $table->foreign('colaborador')->references('id')->on('colaboradors');
            $table->foreign('modulo')->references('id')->on('modulos');

            $table->string(column:'tipo');
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
        Schema::dropIfExists('autorizados');
    }
};
