<?php

namespace App\Http\Controllers;
session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModificationInfosDController extends Controller
{
  public function modif(){
    //l'utilisateur choisi les infos qu'il souhaite modifier
    //dd($_SESSION['id']);


      $nom2 = request('nom2');
      $prenom2 = request('prenom2');
      $email2 = request('email2');
      $mdp2 = request('mdp2');


      //  dd("pas co");

      if ($nom2 != null){
        $resultat = DB::table('doctorants')->where('id', '=', $_SESSION['id'])
        ->update(array('nom' => $nom2));
      }
      if($prenom2 != null){
        $resultat = DB::table('doctorants')->where('id', '=', $_SESSION['id'])
        ->update(array('prenom' => $prenom2));
      }
      if($mdp2 != null){
        $resultat = DB::table('doctorants')->where('id', '=', $_SESSION['id'])
        ->update(array('mot_de_passe' =>  password_hash($mdp2, PASSWORD_DEFAULT)));
      }
      if($email2 != null){
        $resultat = DB::table('doctorants')->where('id', '=', $_SESSION['id'])
        ->update(array('email' => $email2));
      }

      return back();



  }






}
