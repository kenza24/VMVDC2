<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionControllerE extends Controller
{
    public function formulaire(){
      return view ('connexionE');
    }

    public function traitement(){
      request()->validate([
        'emailE'=>['required', 'email'],
        'mdpE' => ['required'],
      ]);
      //essayer une connexion
      $resultat=auth()->attempt([
        'email' => request('emailE'),
        'password' => request('mdpE'),
      ]);

      if ($resultat) { //si les id sont bons (renvoie true)
          return redirect ('/compteE');
      }

      return back()->withInput()->withErrors([
        'email'=>'Vos identifiants sont incorrectes'
      ]); //retourne a la page precedente (le formulaire si pas bon id)
      //with input -> pour renvoyer le formulaire avec l'email entrer

      //var_dump($resultat); //affiche le résultat - un boolean (vrai si connexion est bonne)

    }
}
