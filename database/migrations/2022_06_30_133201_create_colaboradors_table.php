<?php

use Doctrine\DBAL\Schema\Column;
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
            $table
                ->foreignId('funcao_id')
                ->nullOnDelete()
                ->constrained('funcaos')
            ;

            $table
                ->foreignId('contrato_id')
                ->nullOnDelete()
                ->constrained('contratos')
                ;

            $table
                ->foreignId('contrato_centro_custo')
                ->nullOnDelete()
                ->constrained('contratos')
                ;

            $table->foreignId(column:'user_id')
                ->constrained()
                ->cascadeOnDelete()
                ;

            // $table->foreign('funcao')->references('id')->on('funcaos');
            // $table->foreign('contrato')->references('id')->on('contratos');
            // $table->foreign('contrato_centro_custo')->references('id')->on('contratos');
            // $table->foreign('user')->references('id')->on('users');

            $table->string(column:'nome');

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
