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
            $table->string('heure');
            $table->string('sujet')->nullable();
            $table->integer('idEnseignant')->nullable();
            $table->integer('idClasse')->nullable();
            $table->string('salle')->nullable();
            $table->integer('idAdminReferent')->nullable();
            $table->integer('nombreEleves')->nullable();
            $table->integer('nombreFilles')->nullable();
            $table->integer('nombreGarcons')->nullable();
            $table->string('avisSession')->nullable();
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
