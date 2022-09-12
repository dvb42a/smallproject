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
        Schema::create('raceseriesmap', function (Blueprint $table) {
            $table->id('rsm_id');
            $table->integer('rs_id');
            $table->integer('m_id');
            $table->integer('rsm_mo')->nullable();
            $table->integer('rsm_extra')->nullable();
            $table->integer('rsm_state')->nullable();
            $table->integer('rsm_mcount');
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
        Schema::dropIfExists('raceseriesmap');
    }
};
