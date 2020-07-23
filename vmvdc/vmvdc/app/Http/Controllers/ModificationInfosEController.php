<?php

namespace App\Http\Controllers;
session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModificationInfosEController extends Controller
{
  public function modif(){


      $nom2 = request('nom2');
      $prenom2 = request('prenom2');
      $email2 = request('email2');
      $mdp2 = request('mdp2');

      $nomH=htmlspecialchars($nom2);
      $prenomH=htmlspecialchars($prenom2);
      $emailH=htmlspecialchars($email2);
      $mdpH=htmlspecialchars($mdp2);


      //Gérer les cas ou l'utilisateur ne modifie pas toutes les infos

      if ($nom2 != null){
        $resultat = DB::table('enseignants')->where('id', '=', $_SESSION['id'])
        ->update(array('nom' => $nomH));
      }
      if($prenom2 != null){
        $resultat = DB::table('enseignants')->where('id', '=', $_SESSION['id'])
        ->update(array('prenom' => $prenomH));
      }
      if($mdp2 != null){
        $resultat = DB::table('enseignants')->where('id', '=', $_SESSION['id'])
        ->update(array('mot_de_passe' =>  password_hash($mdpH, PASSWORD_DEFAULT)));
      }
      if($email2 != null){
        $resultat = DB::table('enseignants')->where('id', '=', $_SESSION['id'])
        ->update(array('email' => $emailH));
      }

      return redirect('/enseignants');



  }
}
