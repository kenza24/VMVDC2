<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('niveau')->nullable();
            $table->integer('idEnseignant')->nullable();
            $table->boolean('dejaVenu')->nullable();
            $table->boolean('rep')->nullable();
            $table->string('academie')->nullable();
            $table->integer('choixSession1')->nullable();
            $table->integer('choixSession2')->nullable();
            $table->integer('choixSession3')->nullable();
            $table->string('etablissementScolaire')->nullable();
            $table->string('codePostal')->nullable();
            $table->integer('effectifClasse')->nullable();
            $table->string('ville')->nullable();
            $table->integer('nb_accompagnateurs')->nullable();
            $table->string('nom')->nullable();
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
        Schema::dropIfExists('classes');
    }
}
