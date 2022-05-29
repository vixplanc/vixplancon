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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column:'lane_id')
            ->constrained(table:'lanes')
            ;
            // $table->foreignId(column:'status')
            // ->constrained()
            // ->nullable()
            // ;

            $table->string(column:'name');
            $table->text(column:'description')->nullable();
            $table->string(column:'email')->nullable();
            $table->string(column:'wapp')->nullable();
            $table->string(column:'fbook')->nullable();
            $table->string(column:'phone')->nullable();


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
        Schema::dropIfExists('lead');
    }
};
