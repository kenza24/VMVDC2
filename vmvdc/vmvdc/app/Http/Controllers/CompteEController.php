<?php

namespace App\Http\Controllers;

session_start();

use App\Enseignants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteEController extends Controller
{

  public function accueil(){
    if(isset($_SESSION['connecte']) and preg_match("#^enseignant$#", $_SESSION['connecte']) and isset($_SESSION['id'])){
      $data = DB::table('enseignants')->select('nom', 'prenom', 'email')->where('id', $_SESSION['id'])->get();
      //la personne est tojours connectée
      return view ('enseignants', [
        'data' => $data
      ]);
    }

    return view('connexionE');
  }

  public function deconnexion()
  {
    if(isset($_SESSION['connecte'])){
      unset($_SESSION['connecte']);
    }

    return redirect ('/');
  }

  public function sessions()
  {
    $sessions = DB::table('sessions')->get();
    $id = []; //id des classes sélectionnées par les enseignants
    $sessionDoctorant = [];
    foreach ($sessions as $keySessions => $session) {
      array_push($id, $session->idClasse);
      $sessionDoctorant[$session->id] = "";
    }
    
    $classes = DB::table('classes')->where('idEnseignant', $_SESSION['id'])->get();

    $idClasses = [];
    foreach ($classes as $keyClasse => $classe) {
      $idClasses[$classe->id] = $classe;
    }

    $enseignant = DB::table('enseignants')->where('id', $_SESSION['id'])->get()[0];

    $participation_doctorant = DB::table('participations_doctorants')->get();

    //Pour chq session, on donne une chaine de caractere avec les noms des doctorants qui y participent
    foreach ($participation_doctorant as $key => $value) {
      $doctorants = DB::table('doctorants')->select('nom', 'prenom')->where('id',$value->idDoctorants)->get()[0];
      $sessionDoctorant[$value->idSession] .= " - ".$doctorants->prenom." ".$doctorants->nom;
    }

    $etatValidation = DB::table('informations')->get()[0]->etatValidation;

    return view ('sessionsE', [
      'classes' => $idClasses,
      'sessions' => $sessions,
      'enseignant' => $enseignant,
      'sessionDoctorant' => $sessionDoctorant,
      'etatValidation' => $etatValidation
    ]);
  }

  public function acceptation()
  {
    $idSession = request('idSession');
    $resultat = DB::table('sessions')->where('id', '=', $idSession)->update(array('acceptation' => 1));
    return back();
  }

  public function refus()
  {
    $idSession = request('idSession');
    $resultat = DB::table('sessions')->where('id', '=', $idSession)->update(array('acceptation' => 2));
    return back();
  }
}
