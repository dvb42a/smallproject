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
        Schema::create('carinraceseries', function (Blueprint $table) {
            $table->id('crs_id');
            $table->integer('rs_id');
            $table->integer('c_id');
            $table->integer('rs_tsource');
            $table->timestamps();
            $table->integer('crs_order');
            $table->integer('crs_ranking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driverinraceseries');
    }
};
