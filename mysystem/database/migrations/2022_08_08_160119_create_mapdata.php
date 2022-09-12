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
        Schema::create('mapdata', function (Blueprint $table) {
            $table->id('m_id');
            $table->string('m_name')->unique();
            #all the rating
            $table->integer('m_safe');
            $table->integer('m_smooth');
            $table->integer('m_cont');
            $table->integer('m_design');
            $table->integer('m_pro');
            $table->integer('m_rate');
            $table->integer('m_final');
            $table->integer('m_finalrate');
            #end of rating
            $table->string('m_photopath');
            $table->string('m_photoname');
            $table->integer('mrs_id');
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
        Schema::dropIfExists('mapdata');
    }
};
