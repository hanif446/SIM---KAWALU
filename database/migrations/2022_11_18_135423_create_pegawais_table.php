<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('nip')->unique();
            $table->string('nama_pegawai');
            $table->string('tempat_lhr')->nullable();
            $table->date('tgl_lhr')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->unsignedBigInteger('golongan_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('diklat_pim')->nullable();
            $table->string('thn_lulus')->nullable();
            $table->string('uker');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('golongan_id')->references('id')->on('golongan_gajis')->onDelete('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
};
