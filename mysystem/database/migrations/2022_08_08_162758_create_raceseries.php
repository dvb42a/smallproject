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
        Schema::create('raceseries', function (Blueprint $table) {
            $table->id('rs_id');
            $table->string('rs_name')->unique();
            $table->integer('ct_id');
            $table->string('rs_photopath');
            $table->string('rs_photoname');
            $table->timestamps();
            $table->integer('rss_id');
            $table->integer('rs_mstate');
            $table->integer('rs_cstate');
            $table->integer('rs_morder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raceseries');
    }
};
