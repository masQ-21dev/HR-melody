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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id('id');
            $table->string('nomor_ktp');
            $table->string('nama');
            $table->date('tanggal_lahir')->nullable();
            $table->enum('gender', ['L', 'P']);
            $table->enum('agama', ['null','Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu' ])->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->enum('golongan_darah', ['null','A', 'B', 'O', 'AB'])->nullable();
            $table->string('alamat')->nullable();
            $table->char("phone", 20)->nullable();
            $table->integer('anak_ke')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
