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
        Schema::create('bestelling_regels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bestelling_id');
            $table->unsignedBigInteger('artikel_id');
            $table->unsignedBigInteger('eenheid_id');
            $table->foreign('bestelling_id')->references('id')->on('bestellingen');
            $table->foreign('artikel_id')->references('id')->on('artikelen');
            $table->foreign('eenheid_id')->references('id')->on('eenheden');
            $table->unsignedBigInteger('aantal');
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
        Schema::dropIfExists('bestelling_regels');
    }
};
