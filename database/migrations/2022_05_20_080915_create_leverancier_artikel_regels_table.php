<?php

use App\Models\Artikel;
use App\Models\Leverancier;
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
        // we behouden id voor het gemak
        // anders moet je meervoudige PK maken
        // is ook logischer: door timestamps kan een product van dezelfde leverancier
        // in de tijd in prijs wijzigen (anders zou je zelfs triple PK moeten maken)
        Schema::create('leverancier_artikel_regels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leverancier_id');
            $table->unsignedBigInteger('artikel_id');
            $table->foreign('artikel_id')->references('id')->on('artikelen')->onDelete('cascade');
            $table->foreign('leverancier_id')->references('id')->on('leveranciers');
            $table->decimal('prijs', 8, 2);
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
        Schema::dropIfExists('leverancier_artikel_regels');
    }
};
