<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Siswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nisn');
            $table->string('nama');
            $table->string('email');
            $table->string('no_telp');
            $table->string('foto');
            $table->string('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('alamat');
            $table->string('asal_sekolah');
            $table->string('status_ayah');
            $table->string('nama_ayah');
            $table->string('nik_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('gaji_ayah');
            $table->string('status_ibu');
            $table->string('nama_ibu');
            $table->string('nik_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('gaji_ibu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biaya_daftar');
    }
}
