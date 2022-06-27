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
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string(column:'placa_cavalo');
            $table->string(column:'prefixo_cavalo');
            $table->string(column:'placa_semi_reboque');
            $table->string(column:'tipo_conjunto');
            $table->string(column:'contrato');
            $table->string(column:'regime');
            $table->string(column:'cod_sap');
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
        Schema::dropIfExists('equipamentos');
    }
};
