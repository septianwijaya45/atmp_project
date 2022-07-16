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
        Schema::create('detail_trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('identitas_id');
            $table->unsignedBigInteger('jenis_training_id');
            $table->text('nama_training');
            $table->date('tgl_training');
            $table->date('tgl_sertifikat');
            $table->string('no_sertifikat');
            $table->string('no_reg');
            $table->text('vendor');
            $table->text('img');
            $table->timestamps();

            $table->foreign('identitas_id')->references('id')->on('identitases')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jenis_training_id')->references('id')->on('jenis_trainings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_trainings');
    }
};
