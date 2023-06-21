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
        Schema::create('cooking_processing_ingredient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cooking_process_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->dropColumn('order');
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
        Schema::dropIfExists('cooking_processing_ingredient');
    }
};
