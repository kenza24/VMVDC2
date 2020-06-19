<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;

class CompteDController extends Controller
{
  public function accueil(){
    if(isset($_SESSION['connecte']) and preg_match("#^doctorant$#", $_SESSION['connecte'])){
      //la personne est tojours connectée
      return view ('doctorants');
    }

    return view('connexionD');
  }

  public function deconnexion()
  {
    if(isset($_SESSION['connecte'])){
      unset($_SESSION['connecte']);
    }

    return redirect ('/');
  }
}
