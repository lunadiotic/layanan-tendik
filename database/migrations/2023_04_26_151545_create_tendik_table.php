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
            $table->enum('jenjang', ['sd', 'smp']);
            $table->enum('status', ['guru', 'kepala sekolah']);
            $table->string('status_detail')->nullable();
            $table->foreignId('golongan_id')->constrained('golongan')->onDelete('cascade');
            $table->foreignId('satpen_id')->constrained('satpen')->onDelete('cascade');
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
