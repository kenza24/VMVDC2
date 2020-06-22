<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteDController extends Controller
{
  public function accueil(){
    if(isset($_SESSION['connecte']) and preg_match("#^doctorant$#", $_SESSION['connecte']) and isset($_SESSION['id'])){
      $data = DB::table('doctorants')->select('nom', 'prenom', 'email')->where('id', $_SESSION['id'])->get();
      //la personne est tojours connectée
      return view ('doctorants', [
        'data' => $data
      ]);
    }

    return view('connexionD');
  }

  public function deconnexion()
  {
    if(isset($_SESSION['connecte']) and isset($_SESSION['id'])){
      unset($_SESSION['connecte']);
      unset($_SESSION['id']);
    }

    return redirect ('/');
  }

  
}
