<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom');
          $table->string('prenom');
          $table->string('email')->unique();
          $table->string('mot_de_passe');
          $table->boolean('dejaVenu')->default(0);
          $table->string('numTel');
          $table->integer('age');
          $table->boolean('isEnseignant');
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
        Schema::drop('enseignants');
    }
}
