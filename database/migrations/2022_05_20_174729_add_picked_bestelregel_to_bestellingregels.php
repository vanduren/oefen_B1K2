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
        Schema::table('bestelling_regels', function (Blueprint $table) {
            $table->boolean('picked_bestelregel')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bestelling_regels', function (Blueprint $table) {
            $table->dropColumn('picked_bestelregel');
        });
    }
};
