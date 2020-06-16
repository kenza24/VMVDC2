<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class ConnexionControllerE extends Controller
{
    public function formulaire(){
      return view ('connexionE');
    }

    public function traitement(){
      request()->validate([
        'emailE'=>'required|email',
        'mdpE' => 'required'
      ]);

      $emailE = request('emailE');
      $mdpE = request('mdpE');

      if(Auth::attempt([
        'email' => $emailE,
        'mot_de_passe' => $mdpE
      ])) {
        dd('True'); //affiche le résultat - un boolean (vrai si connexion est bonne)
      }

      dd('False');

      /*//essayer une connexion
      $resultat=auth()->attempt([
        'email' => request('emailE'),
        'password' => request('mdpE'),
      ]);

      //var_dump($resultat); //affiche le résultat - un boolean (vrai si connexion est bonne)

      if ($resultat) { //si les id sont bons (renvoie true)
          return redirect ('/compteE');
      }*/

      /*return back()->withInput()->withErrors([
        'email'=>'Vos identifiants sont incorrectes'
      ]); //retourne a la page precedente (le formulaire si pas bon id)
      //with input -> pour renvoyer le formulaire avec l'email entrer*/

      

    }
}
