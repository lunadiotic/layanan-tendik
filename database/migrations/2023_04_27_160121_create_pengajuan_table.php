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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tendik_id')->constrained('tendik')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade');
            $table->string('dokumen_persyaratan');
            $table->string('dokumen_sk')->nullable();
            $table->enum('status', ['menunggu', 'proses', 'selesai', 'revisi', 'ditolak'])->default('menunggu');
            $table->text('keterangan')->nullable();
            // Izin Memimpin
            $table->date('tanggal_terbit')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->foreignId('satpen_id')->nullable()->constrained('satpen')->onDelete('cascade');
            // Kenaikan Pangkat
            $table->foreignId('unit_kerja')->nullable()->constrained('satpen')->onDelete('cascade');
            $table->foreignId('golongan_lama')->nullable()->constrained('golongan');
            $table->foreignId('golongan_baru')->nullable()->constrained('golongan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};