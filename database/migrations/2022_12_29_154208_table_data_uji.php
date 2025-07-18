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
        Schema::create('data_uji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pulau');
            $table->integer('id_user');
            $table->integer('tahun');
            $table->timestamps();
            $table->foreign('id_pulau')->references('id')->on('data_pesisir')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_uji');
    }
};
