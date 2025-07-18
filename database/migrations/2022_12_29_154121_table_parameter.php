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
        Schema::create('parameter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_gol');
            $table->string('parameter');
            $table->string('nama_lain')->nullable();
            $table->enum('jenis', ['biota', 'wisata']);
            $table->timestamps();
            $table->foreign('id_gol')->references('id')->on('gol_parameter')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameter');
    }
};
