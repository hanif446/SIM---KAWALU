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
        Schema::create('detail_potongan_gaji_ttps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gaji_ttp_id');
            $table->integer('infak');
            $table->integer('bjb');
            $table->integer('mukti_resik');
            $table->integer('bjbs');
            $table->integer('al_madinah');
            $table->timestamps();

            $table->foreign('gaji_ttp_id')->references('id')->on('gaji_ttps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_potongan_gaji_ttps');
    }
};
