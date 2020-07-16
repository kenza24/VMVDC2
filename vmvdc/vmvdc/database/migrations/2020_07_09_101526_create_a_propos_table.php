<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAProposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aPropos', function (Blueprint $table) {
            $table->string('descriptif')->nullable();
            $table->string('equipeAdmin')->nullable();
            $table->string('mentionsLegales')->nullable();
            $table->string('equipeInfo')->nullable();
            $table->string('droits')->nullable();
            $table->string('conceptDesign')->nullable();
            $table->string('loiInformatiqueEtLiberte')->nullable();
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
