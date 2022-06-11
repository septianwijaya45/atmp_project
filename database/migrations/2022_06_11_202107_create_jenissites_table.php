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
        Schema::create('jenissites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atmp_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('atmp_id')->references('id')->on('atmps')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenissites');
    }
};
