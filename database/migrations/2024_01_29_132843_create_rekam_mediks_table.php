<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rekam_mediks', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('pasien_id')->constrained();
            // $table->foreignId('poli_id')->constrained();
            // $table->foreignId('penyakit_id')->constrained();

            $table->string('NO_RM')->nullable();
            $table->bigInteger('pasien_id')->unsigned();
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->bigInteger('poli_id')->unsigned();
            $table->foreign('poli_id')->references('id')->on('polis')->onDelete('cascade');
            $table->bigInteger('penyakit_id')->unsigned();
            $table->foreign('penyakit_id')->references('id')->on('penyakits')->onDelete('cascade');

            $table->integer('umur');
            $table->string('TD')->nullable();
            $table->string('nadi')->nullable();
            $table->string('pernapasan')->nullable();
            $table->string('suhu')->nullable();
            $table->string('bb')->nullable();
            $table->string('tb')->nullable();
            $table->date('tanggal_pemeriksaan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_mediks');
    }
};
