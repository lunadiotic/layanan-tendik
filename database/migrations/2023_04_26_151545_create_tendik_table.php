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
        Schema::create('tendik', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama_tendik');
            $table->enum('pendidikan', ['sd', 'smp', 'sma', 's1', 's2', 's3']);
            $table->enum('status', ['guru', 'kepala sekolah']);
            $table->string('status_detail')->nullable();
            $table->string('korwil')->nullable();
            $table->string('no_hp')->nullable();
            $table->date('tahun_pensiun')->nullable();
            $table->string('keterangan')->nullable();
            $table->foreignId('golongan_id')->constrained('golongan');
            $table->foreignId('satpen_id')->constrained('satpen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tendiks');
    }
};
