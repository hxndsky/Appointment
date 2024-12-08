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
        // Tabel Obat
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat', 50)->nullable(false);
            $table->string('kemasan', 35)->nullable();
            $table->unsignedInteger('harga')->default(0);
            $table->timestamps();
        });

        // Tabel Poli
        Schema::create('poli', function (Blueprint $table) {
            $table->id();
            $table->string('nama_poli', 50)->nullable(false);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        // Tabel Dokter
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150)->nullable(false);
            $table->string('alamat', 255)->nullable();
            $table->integer('no_hp')->nullable(false);
            $table->foreignId('id_poli')->constrained('poli')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel Pasien
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150)->nullable(false);
            $table->string('alamat', 255)->nullable(false);
            $table->unsignedInteger('no_ktp')->nullable(false);
            $table->unsignedInteger('no_hp')->nullable(false);
            $table->char('no_rm', 10)->nullable();
            $table->timestamps();
        });

        // Tabel Jadwal Periksa
        Schema::create('jadwal_periksa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_dokter')->constrained('dokter')->onDelete('cascade');
            $table->string('hari', 10)->nullable(false);
            $table->time('jam_mulai')->nullable(false);
            $table->time('jam_selesai')->nullable(false);
            $table->timestamps();
        });

        // Tabel Daftar Poli
        Schema::create('daftar_poli', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pasien')->constrained('pasien')->onDelete('cascade');
            $table->foreignId('id_jadwal')->constrained('jadwal_periksa')->onDelete('cascade');
            $table->text('keluhan')->nullable(false);
            $table->integer('no_antrian')->nullable();
            $table->timestamps();
        });

        // Tabel Periksa
        Schema::create('periksa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_daftar_poli')->constrained('daftar_poli')->onDelete('cascade');
            $table->date('tgl_periksa')->nullable(false);
            $table->text('catatan')->nullable(false);
            $table->integer('biaya_periksa')->nullable();
            $table->timestamps();
        });

        // Tabel Detail Periksa
        Schema::create('detail_periksa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_periksa')->constrained('periksa')->onDelete('cascade');
            $table->foreignId('id_obat')->constrained('obat')->onDelete('cascade');
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
