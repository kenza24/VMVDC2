<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjoutChoixSession3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('classes', function(Blueprint $table){
         $table->integer('choixSession3')->nullable();
       });
     }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::table('classes', function(Blueprint $table){
         $table->drop('choixSession3');
       });
     }
}
