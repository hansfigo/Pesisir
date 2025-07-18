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
        Schema::create('sampel_uji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_uji');
            $table->unsignedBigInteger('id_parameter');
            $table->float('hasil')->nullable();
            $table->integer('uji_ke')->default(1);
            $table->timestamps();
            $table->foreign('id_uji')->references('id')->on('data_uji')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sampel_uji');
    }
};
