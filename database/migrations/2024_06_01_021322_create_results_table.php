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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->float('result');
            $table->string('nama_penyakit');
            $table->string('selected_gejalas');
            $table->float('nilai_probabilitas');
            $table->string('solusi_penyakit');
            $table->timestamps();

            // $table->foreign('kode_penyakit')->references('id')->on('penyakits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
};
