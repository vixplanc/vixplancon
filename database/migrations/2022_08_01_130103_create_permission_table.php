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
        Schema::create('permissions', function (Blueprint $table) {

            $table->id();
            $table->foreignId(column:'user_id');
            // $table->foreignId(column:'system_module_id');
            $table
                    ->foreignId('system_module_id')
                    ->nullOnDelete()
                    ->constrained('system_modules')
                    ;


            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('system_module_id')->references('id')->on('system_module');

            $table->string(column:'type');
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
