<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteDController extends Controller
{
    public function accueil(){
      if(! auth()->check()){
        //si la personne est un invitée -> retour a la page de connexion
        return redirect('/connexionD');
      }

      return view('compteD');
    }
}
