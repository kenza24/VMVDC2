<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FichiersDController extends Controller{

  public function ajoutFichier(){
    request()-> validate([
      'fichier'=> ['required', 'pdf'],
    ]);
    //echo("cc");

  }




}
