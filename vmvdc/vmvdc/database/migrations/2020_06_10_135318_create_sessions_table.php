<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('sujet');
            $table->integer('idDoctorant');
            $table->integer('idEnseignant');
            $table->string('salle');
            $table->integer('idAdminReferent');
            $table->integer('nombreEleves');
            $table->integer('nombreFilles');
            $table->integer('nombreGarcons');
            $table->string('avisSession');
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
        Schema::dropIfExists('sessions');
    }
}
