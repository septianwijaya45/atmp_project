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
        Schema::create('identitases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenissite_id');
            $table->string('nik');
            $table->string('nama');
            $table->string('jabatan');
            $table->timestamps();

            $table->foreign('jenissite_id')->references('id')->on('jenissites')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identitases');
    }
};
