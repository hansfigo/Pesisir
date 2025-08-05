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
        Schema::table('data_parameter', function (Blueprint $table) {
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('data_parameter', 'coefficient_a')) {
                $table->decimal('coefficient_a', 10, 8)->nullable()->comment('Coefficient A in formula y = A*e^(B*x)');
            }
            if (!Schema::hasColumn('data_parameter', 'coefficient_b')) {
                $table->decimal('coefficient_b', 10, 8)->nullable()->comment('Coefficient B in formula y = A*e^(B*x)');
            }
            if (!Schema::hasColumn('data_parameter', 'y0')) {
                $table->decimal('y0', 5, 2)->nullable()->default(80.00)->comment('Default y value for parameters without coefficients');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_parameter', function (Blueprint $table) {
            $table->dropColumn(['coefficient_a', 'coefficient_b', 'y0']);
        });
    }
};
