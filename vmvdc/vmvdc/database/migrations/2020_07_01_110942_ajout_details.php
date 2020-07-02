<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjoutDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('doctorants', function(Blueprint $table){
         $table->string('details')->nullable();
       });
     }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::table('$doctorants', function(Blueprint $table){
         $table->drop('details');
       });
     }
}
