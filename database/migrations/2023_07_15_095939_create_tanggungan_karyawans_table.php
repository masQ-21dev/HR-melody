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
        Schema::create('tanggungan_karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('hubungan', ['istri', 'anak']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('gender', ['L', 'P']);
            $table->string('pendidikan')->nullable();
            $table->string('Pekerjaan')->nullable();
            $table->foreign('id_karyawan')->references('id')->on('karyawans')
            ->constrained('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggungan_karyawans');
    }
};
