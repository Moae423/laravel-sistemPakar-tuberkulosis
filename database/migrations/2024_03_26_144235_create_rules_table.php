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
            $table->foreignId('kode_gejala')->constrained('gejalas')->onDelete('cascade');
            $table->foreignId('kode_penyakit')->constrained('gejalas')->onDelete('cascade');
            $table->float('nilai_probabilitas');
            $table->timestamps();

            // $table->foreign('kode_penyakit')->references('id')->on('penyakits');
            // $table->foreign('kode_gejala')->references('id')->on('gejalas');
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
