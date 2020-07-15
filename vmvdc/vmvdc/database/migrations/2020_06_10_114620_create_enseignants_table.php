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
          $table->string('nom')->nullable();
          $table->string('prenom')->nullable();
          $table->string('email')->unique();
          $table->string('mot_de_passe')->nullable();
          $table->boolean('dejaVenu')->default(0);
          $table->string('numTel')->nullable();
          $table->integer('age')->nullable();
          $table->boolean('isEnseignant')->nullable();
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
