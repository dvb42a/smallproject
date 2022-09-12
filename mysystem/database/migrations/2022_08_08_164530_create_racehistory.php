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
        Schema::create('racehistory', function (Blueprint $table) {
            $table->id('rh_id');
            $table->char('rh_time',9);
            $table->integer('c_id');
            $table->integer('m_id');
            $table->integer('rs_id')->nullable();
            $table->integer('rs_source');
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
        Schema::dropIfExists('racehistory');
    }
};
