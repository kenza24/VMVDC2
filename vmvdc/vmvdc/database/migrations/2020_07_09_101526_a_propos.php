<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class APropos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aPropos', function (Blueprint $table) {
            $table->string('descriptif');
            $table->string('equipeAdmin');
            $table->string('mentionsLegales');
            $table->string('equipeInfo');
            $table->string('droits');
            $table->string('conceptDesign');
            $table->string('loiInformatiqueEtLiberte');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aPropos');
    }
}
