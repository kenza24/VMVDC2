<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConnexionControllerD extends Controller
{
  public function formulaire(){
    return view ('connexionD');
  }

  public function traitement(){
    request()->validate([
      'emailD'=>'required',
      'mdpD' => 'required'
    ]);

    //récupération des valeurs entrées
    $emailD = request('emailD');
    $mdpD = request('mdpD');

    $emailDH=htmlspecialchars($emailD);
    $mdpDH=htmlspecialchars($mdpD);

    $infos = DB::table('doctorants')->select('mot_de_passe', 'id')->where('email', $emailD)->get();
    //récupération de l'objet de l'email contenant le hash du mot de passe

    //récupération du hash dans l'objet et comparaison avec le mot de passe entré
    if (isset($infos[0]->mot_de_passe) and password_verify($mdpD, $infos[0]->mot_de_passe)) {
      $_SESSION['connecte'] = "doctorant";
      $_SESSION['id'] = $infos[0]->id;
      return redirect ('/doctorants');
    }

    return back()->withInput()->withErrors([
      'email'=>'Vos identifiants sont incorrectes'
    ]);//retourne a la page precedente (le formulaire si pas bon id)
    //with input -> pour renvoyer le formulaire avec l'email entrer*/

  }
}
