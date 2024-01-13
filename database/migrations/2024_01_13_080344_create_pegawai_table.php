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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();

             $table->foreignId('user_id')->nullable()->constrained('users')->noActionOnDelete();
             $table->string('posisi_lamar', 100)->nullable();
             $table->string('nama', 100)->nullable();
             $table->string('no_ktp', 100)->nullable();
             $table->string('ttl', 100)->nullable();
             $table->enum('jenis_kelamin',['LAKI-LAKI','PEREMPUAN'])->nullable();
             $table->string('agama', 100)->nullable();
             $table->string('golongan_darah', 10)->nullable();
             $table->string('status', 100)->nullable();
             $table->string('alamat_ktp')->nullable();
             $table->string('alamat_tinggal')->nullable();
             $table->string('email', 100)->nullable();
             $table->string('no_telp', 50)->nullable();
             $table->string('orang_terdekat')->nullable();
             $table->longText('riwayat_pendidikan')->nullable();
             $table->longText('riwayat_pelatihan')->nullable();
             $table->longText('riwayat_pekerjaan')->nullable();
             $table->text('skill')->nullable();
             $table->enum('penempatan_luar_kantor', [0,1])->comment('1 Ya, 2 Tidak')->nullable();
             $table->string('penghasilan', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
