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
        Schema::create('rules', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('idGejala');
            $table->unsignedBigInteger('idPenyakit');
            $table->float('nilai_probabilitas');
            $table->timestamps();

            $table->foreign('idGejala')->references('id')->on('gejalas')->onDelete('cascade');
            $table->foreign('idPenyakit')->references('id')->on('penyakits')->onDelete('cascade');
        });
    }

    /**f
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules');
    }
};
