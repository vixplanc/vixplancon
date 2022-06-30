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
        Schema::create('consolidados', function (Blueprint $table) {
            $table->id();

            $table->foreignId(column:'modelo');
            $table->foreignId(column:'equipamento')->nullable();
            $table->foreignId(column:'contrato');
            $table->foreignId(column:'contrato_centro_custo');


            $table->foreign('modelo')->references('id')->on('modelos');
            $table->foreign('contrato')->references('id')->on('contratos');
            $table->foreign('contrato_centro_custo')->references('id')->on('contratos');
            $table->foreign('equipamento')->references('id')->on('equipamentos');

            $table->string(column:'status');
            $table->boolean(column:'contratual');
            $table->string(column:'prefixo');
            $table->string(column:'regime');
            $table->string(column:'codigo_sap');


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
        Schema::dropIfExists('consolidados');
    }
};
