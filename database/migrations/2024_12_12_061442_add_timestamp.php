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
        Schema::table('obat', function (Blueprint $table) {
            
            $table->timestamps();
        });

        // Tabel Poli
        Schema::table('poli', function (Blueprint $table) {
            
            $table->timestamps();
        });

        // Tabel Dokter
        Schema::table('dokter', function (Blueprint $table) {
            
            $table->timestamps();
        });

        // Tabel Jadwal Periksa
        Schema::table('jadwal_periksa', function (Blueprint $table) {
            
            $table->timestamps();
        });

        // Tabel Daftar Poli
        Schema::table('daftar_poli', function (Blueprint $table) {
            
            $table->timestamps();
        });

        // Tabel Periksa
        Schema::table('periksa', function (Blueprint $table) {
        
            $table->timestamps();
        });

        // Tabel Detail Periksa
        Schema::table('detail_periksa', function (Blueprint $table) {
            
            $table->timestamps();
        });

        Schema::table('pasien', function (Blueprint $table) {
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
