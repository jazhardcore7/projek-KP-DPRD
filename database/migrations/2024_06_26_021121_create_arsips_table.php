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
        Schema::create('arsips', function (Blueprint $table) {
            $table->id('nomor'); // Primary key
            $table->string('kode_kelas');
            $table->string('jenis_arsip');
            $table->text('uraian');
            $table->string('kurun_waktu');
            $table->integer('jumlah_berkas');
            $table->date('tanggal_entry')->useCurrent();
            $table->string('uploader');
            $table->string('file'); // Assuming file path is stored as a string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsips');
    }
};
