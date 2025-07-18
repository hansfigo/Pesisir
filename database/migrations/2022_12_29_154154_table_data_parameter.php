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
        Schema::create('data_parameter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_parameter');
            $table->string('satuan');
            $table->string('baku_mutu');
            $table->string('nilai')->nullable();
            $table->timestamps();
            $table->foreign('id_parameter')->references('id')->on('parameter')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_parameter');
    }
};
