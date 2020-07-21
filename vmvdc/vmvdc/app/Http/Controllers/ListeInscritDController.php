<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListeInscritDController extends Controller
{

  public function sessionsI(){

    $idD=$_SESSION['id'];
    //dd($idD);
    //selection des id de session
    //$sessions= DB::table('sessions')->select('id');

    $idS = DB::table('participations_doctorants')->where('idDoctorants', '=', $_SESSION['id'])->select('idSession')->get();
    //dd($idS);
    $sessions=[];
    foreach($idS as $s){
      $session = DB::table('sessions')->where ('id', '=', $s->idSession)->select('id', 'date', 'heure', 'idEnseignant', 'idClasse')->get();

      //on prend une
      $uneSession = $session[0];

      array_push($sessions, $uneSession);

    }
    //dd($sessions);
  //  dd($sessions);
  $enseignants = [];
    foreach ($sessions as $e){
        $enseignant=DB::table('enseignants')->where('id', '=', $e->idEnseignant)->select('nom', 'prenom', 'id')->get();

        $unEnseignant = $enseignant[0];
        //on verifie si l'enseignant n'est pas deja dans le tableau
        if (! in_array($unEnseignant, $enseignants)){
          array_push($enseignants, $unEnseignant);
        }

    }
    //dd($enseignants);

    $classes = [];
    foreach ($enseignants as $value){

        $classe = DB::table('classes')->where('idEnseignant', '=', $value->id)->select('etablissementScolaire', 'niveau', 'idEnseignant', 'id')->get();

        $uneClasse=$classe[0];

        array_push($classes, $uneClasse);

    }
    //dd($classes);

//    dd($enseignants);
    //dd($sessions);



  //  dd($enseignants);

    //dd($enseignants);


    return view('sessionsInscrisD', [
      'idS'=>$idS,
      'sessions'=>$sessions,
      'enseignants'=>$enseignants,
      //'donneesE'=>$donneesE,
      'classes'=>$classes,

    ]);

  }

  public function enseignants (){
    //recuperation des infos de l'enseignant


    $enseignant=DB::table('sessions')->select('idEnseignant');


    //information de l'enseignants qui correspond a la session selectionné
    $idEnseignant = DB::table('enseignants')->where ('id', '=', $enseignant->idEnseignant)->select('nom', 'prenom', 'mail');
    dd($idEnseignant);

    return view ('sessionsInscrisD', [
      'enseignants'=>$enseignants,
    ]);

  }













}
