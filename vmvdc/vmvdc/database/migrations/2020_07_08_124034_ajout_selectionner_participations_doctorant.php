<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjoutSelectionnerParticipationsDoctorant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void */

     public function up()
     {
         Schema::table('participations_doctorants', function (Blueprint $table) {
             $table->integer('selectionner')->nullable();
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('participations_doctorants', function(Blueprint $table){
             $table->drop('selectionner');
           });
     }
}
