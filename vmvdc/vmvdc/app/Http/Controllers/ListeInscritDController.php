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
    $sessions= DB::table('sessions')->select('id');

    $idS = DB::table('participations_doctorants')->where('idDoctorants', '=', $_SESSION['id'])->select('idSession')->get();
    //dd($idS);
    $sessions=[];
    foreach($idS as $s){
      $session = DB::table('sessions')->where ('id', '=', $s->idSession)->select('date', 'heure', 'idEnseignant', 'idClasse')->get();

      array_push($sessions, $session);

    }
    //dd($sessions);
  //  dd($sessions);
  $enseignants = [];
    foreach ($sessions as $e){
      foreach($e as $value){
        $enseignant=DB::table('enseignants')->where('id', '=', $value->idEnseignant)->select('nom', 'prenom', 'id')->get();
        array_push($enseignants, $enseignant);
      }
    }

    $classes = [];
    foreach ($enseignants as $value){
      foreach($value as $e){
        $classe = DB::table('classes')->where('idEnseignant', '=', $e->id)->select('etablissementScolaire', 'niveau', 'idEnseignant', 'id')->get();

        array_push($classes, $classe);
      }
    }
  //  dd($classes);

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
