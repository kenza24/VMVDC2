<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailSessionDController extends Controller{

  public function details(){

     request()->validate([
        'details'=>'required',
      ]);

      $details = request('details');
      //$id = request('id');
      $id= DB::table('doctorants')->select('id')->get();
      //update de la case "details" avec ce que le doctorant en question a entré
      $res= DB::table('doctorants')->where('id', '=', $id)->update(array('details'=>$details));
      //dd($res);

      return redirect ('/detailSessionD');
    }


      public function ajoutFichier(){

        //echo("cc");
        //affiche le chemin du fichier
        $path=request('fichierD')->store('fichierD');
        $id=DB::table('doctorants')->select('id');
        //chez le doctorant ajoute son fichier, donc where id=id
        $res=DB::table('doctorants')->where('id', '=', $id)->update(array('fichierD'=>$path));
        //return $path;
      }

  //il faut pouvoir afficher les données de la session en question
  /*public function infosEnseignant (){
    $enseignants = DB::table('enseignants')->select('id', 'nom', 'prenom', 'mail')->get();

  }*/

}
