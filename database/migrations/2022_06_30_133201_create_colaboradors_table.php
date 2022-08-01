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
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column:'funcao');
            $table->foreignId(column:'contrato');
            $table->foreignId(column:'contrato_centro_custo');
            $table->foreignId(column:'user')->nullable();

            $table->foreign('funcao')->references('id')->on('funcaos');
            $table->foreign('contrato')->references('id')->on('contratos');
            $table->foreign('contrato_centro_custo')->references('id')->on('contratos');
            $table->foreign('user')->references('id')->on('users');

            $table->string(column:'nome');
            $table->boolean(column:'ativo');

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
        Schema::dropIfExists('colaboradors');
    }
};
