<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionControllerD extends Controller
{
    public function formulaire(){
      return view ('connexionD');
    }

    public function traitement(){
      request()->validate([
        'emailD'=>['required', 'email'],
        'mdpD' => ['required'],
      ]);
      //essayer une connexion
      $resultat=auth()->attempt([
        'email' => request('emailD'),
        'password' => request('mdpD'),
      ]);

      if ($resultat) { //si les id sont bons (renvoie true)
          return redirect ('/compteD');
      }

      return back()->withInput()->withErrors([
        'email'=>'Vos identifiants sont incorrectes'
      ]); //retourne a la page precedente (le formulaire si pas bon id)
      //with input -> pour renvoyer le formulaire avec l'email entrer

      //var_dump($resultat); //affiche le résultat - un boolean (vrai si connexion est bonne)

    }
}
