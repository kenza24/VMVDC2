<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;

class CompteEController extends Controller
{

      public function accueil(){
        if(isset($_SESSION['connecte']) and preg_match("#^enseignant$#", $_SESSION['connecte'])){
          //la personne est tojours connectée
          return view ('enseignants');
        }

        return view('connexionE');
      }

      public function deconnexion()
      {
        if(isset($_SESSION['connecte'])){
          unset($_SESSION['connecte']);
        }

        return redirect ('/');
      }
}
