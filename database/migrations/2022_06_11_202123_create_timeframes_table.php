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
        Schema::create('timeframes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atmp_id');
            $table->unsignedBigInteger('jenissite_id');
            $table->date('plant_start');
            $table->date('plant_finish');
            $table->date('actual_start');
            $table->date('actual_finish');
            $table->integer('tot_peserta');
            $table->integer('act_peserta');
            $table->integer('achiv_peserta');
            $table->text('instruktur');
            $table->integer('percent_achiv_peserta');
            $table->integer('percent_achiv_event_month');
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
        Schema::dropIfExists('timeframes');
    }
};
