<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detailSessionDController extends Controller{

  public function details(){
      //dd("coucou");

      request()->validate([
        'details'=>'required',
      ]);
      $id= DB::table('doctorants')->select('id');
      $details = request('details');
      $resultat = DB::table('doctorants')->insert(array('details' => $details));

      if($resultat) {
          $_SESSION['connecte'] = 'doctorants';
          return redirect ('/detailSessionD');
      }

  return redirect ('/detailSessionD');

  }

}


/*
  public function ajoutFichier(){
    request()-> validate([
      'fichierD'=> ['required'],
    ]);
    //echo("cc");
    //affiche le chemin du fichier
    $path=request('fichierD')->store('fichierD');
    return $path;
  }
}*/
  //il faut pouvoir afficher les données de la session en question
  /*public function infosEnseignant (){
    $enseignants = DB::table('enseignants')->select('id', 'nom', 'prenom', 'mail')->get();

  }*/
