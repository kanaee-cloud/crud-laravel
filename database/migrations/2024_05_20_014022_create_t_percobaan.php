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
        Schema::create('t_percobaan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien');
            $table->string('nama_pasien', 100);
            $table->string('umur_pasien', 2);
            $table->string('gender_pasien', 1);
            $table->string('alamat_pasien', 100);
            $table->string('karir_pasien', 100);
            $table->string('ibu_kandung_pasien', 100);
            $table->string('ayah_kandung_pasien', 100);
            $table->string('penyakit_pasien', 50);
            $table->string('obat_pasien', 100);
            $table->string('terapi_pasien', 100);
            $table->string('konsultasi_pasien', 100);
            $table->string('tes_pasien', 16);
            $table->string('kesehatan_pasien', 16);
            $table->string('tanggal_percobaan', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_percobaan');
    }
};
