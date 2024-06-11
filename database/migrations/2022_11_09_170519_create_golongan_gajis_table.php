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
        Schema::create('golongan_gajis', function (Blueprint $table) {
            $table->id();
            $table->string('golongan');
            $table->integer('nominal_gaji_pokok');
            $table->integer('nominal_gaji_ttp');
            $table->date('tmt_golongan');
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
        Schema::dropIfExists('golongan_gajis');
    }
};
