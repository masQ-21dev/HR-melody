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
        Schema::create('orang_tua_karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('ayah');
            $table->integer('umur_ayah')->unsigned()->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('alamat_ayah')->nullable();
            $table->string('ibu');
            $table->integer('umur_ibu')->unsigned()->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('alamat_ibu')->nullable();
            $table->string('id_karyawan');
            $table->foreign('id_karyawan')->references('id')->on('karyawans')
            ->constrained('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tua_karyawans');
    }
};
