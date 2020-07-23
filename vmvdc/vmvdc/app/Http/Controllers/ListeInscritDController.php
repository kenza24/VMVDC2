<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListeInscritDController extends Controller
{

  public function sessionsI(){
    //TEST si un doctorant est connecte
    if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "doctorant") {
        return redirect('/orientationConnexion');
    }

    $idD=$_SESSION['id'];

    $idS = DB::table('participations_doctorants')->where('idDoctorants', '=', $_SESSION['id'])->select('idSession')->get();

    $sessions=[];
    foreach($idS as $s){
      $session = DB::table('sessions')->where ('id', '=', $s->idSession)->select('id', 'date', 'heure', 'idEnseignant', 'idClasse')->get();


      $uneSession = $session[0];

      array_push($sessions, $uneSession);

    }

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

    return view('sessionsInscrisD', [
      'idS'=>$idS,
      'sessions'=>$sessions,
      'enseignants'=>$enseignants,
      'classes'=>$classes,

    ]);

  }

}
