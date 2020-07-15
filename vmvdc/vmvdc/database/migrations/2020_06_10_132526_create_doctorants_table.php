<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('email')->nullable();
            $table->string('mot_de_passe')->nullable();
            $table->boolean('isDoctorant')->nullable();
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
        Schema::dropIfExists('doctorants');
    }
}
