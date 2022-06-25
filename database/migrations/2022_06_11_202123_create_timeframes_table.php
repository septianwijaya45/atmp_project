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
            $table->date('plant_start')->nullable();
            $table->date('plant_finish')->nullable();
            $table->date('actual_start')->nullable();
            $table->date('actual_finish')->nullable();
            $table->integer('tot_peserta')->nullable();
            $table->integer('act_peserta')->nullable();
            $table->integer('achiv_peserta')->nullable();
            $table->text('instruktur')->nullable();
            $table->integer('percent_achiv_peserta')->nullable();
            $table->integer('percent_achiv_event_month')->nullable();
            $table->timestamps();

            $table->foreign('atmp_id')->references('id')->on('atmps')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenissite_id')->references('id')->on('jenissites')->onDelete('cascade')->onUpdate('cascade');
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
