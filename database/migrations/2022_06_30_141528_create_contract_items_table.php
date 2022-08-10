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
        Schema::create('contract_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId(column:'equipment_model_id');
            $table->foreignId(column:'equipment_id')->nullable();
            $table->foreignId(column:'contract');
            $table->foreignId(column:'cost_center');


            $table->foreign('equipment_model_id')->references('id')->on('equipment_models');
            $table->foreign('contract')->references('id')->on('contracts');
            $table->foreign('cost_center')->references('id')->on('contracts');
            $table->foreign('equipment_id')->references('id')->on('equipments');

            $table->string(column:'status');
            $table->boolean(column:'contractual');
            $table->string(column:'prefix');
            $table->string(column:'contract_regime');
            $table->string(column:'sap_code');


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
        Schema::dropIfExists('contract_items');
    }
};