<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConnexionControllerA extends Controller
{
  public function formulaire(){
    return view ('connexionA');
  }

  public function traitement(){
    request()->validate([
      'emailA'=>'required',
      'mdpA' => 'required'
    ]);

    //récupération des valeurs entrées
    $emailA = request('emailA');
    $mdpA = request('mdpA');

    $infos = DB::table('administrateurs')->select('mot_de_passe', 'id')->where('email', $emailA)->get();
    //récupération de l'objet de l'email contenant le hash du mot de passe

    //récupération du hash dans l'objet et comparaison avec le mot de passe entré
    if (isset($infos[0]->mot_de_passe) and password_verify($mdpA, $infos[0]->mot_de_passe)) {
      $_SESSION['connecte'] = "administrateurs";
      $_SESSION['id'] = $infos[0]->id;
      return redirect ('/administrateurs');
    }

    return back()->withInput()->withErrors([
      'email'=>'Vos identifiants sont incorrectes'
    ]);//retourne a la page precedente (le formulaire si pas bon id)
    //with input -> pour renvoyer le formulaire avec l'email entrer*/

  }
}
