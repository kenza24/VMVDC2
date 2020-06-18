<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;

class CompteEController extends Controller
{

      public function accueil(){
        if(isset($_SESSION['connecte']) and preg_match("#^enseignant$#", $_SESSION['connecte'])){
          //si la personne est un invitée -> retour a la page de connexion
          return redirect('/enseignants');
        }

        return view('connexionE');
      }
}
