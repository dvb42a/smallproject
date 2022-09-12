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
        Schema::create('cardata', function (Blueprint $table) {
            $table->id('c_id');
            $table->string('c_name')->unique();
            $table->string('c_sname')->unique();
            $table->integer('ct_id')->nullable();
            $table->integer('d_id')->nullable();
            $table->string('c_photopath')->nullable();
            $table->string('c_photoname')->nullable();
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
        Schema::dropIfExists('cardata');
    }
};
