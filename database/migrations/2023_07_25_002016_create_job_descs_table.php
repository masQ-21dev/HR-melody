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
        Schema::create('job_descs', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk_kerja');
            $table->date('TMT')->nullable();
            $table->string('posisi')->nullable();
            $table->unsignedBigInteger('id_departement');
            $table->foreign('id_departement')->references('id')->on('departemens')
            ->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_karyawan');
            $table->foreign('id_karyawan')->references('id')->on('karyawans')
            ->constrained('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_descs');
    }
};
