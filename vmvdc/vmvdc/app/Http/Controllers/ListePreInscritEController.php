<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListePreInscritEController extends Controller
{
  public function affichage(){

  //affichage des infos pr les classes
  $classes = DB::table("classes")
  ->where('idEnseignant', '=', $_SESSION['id'])
  ->select('etablissementScolaire', 'niveau', 'choixSession1', 'choixSession2', 'choixSession3')
  ->get();

  $sessions=DB::table('sessions')->select('date', 'heure', 'id')->get();

  $sessionsOrdonnees = [];
  foreach ($sessions as $keySession => $session) {
    $sessionsOrdonnees[$session->id] = $session;
  }

  return view('listePreInscritE', [
      'sessions' => $sessions,
      'classes' => $classes,
      'sessionsOrdonnees'=>$sessionsOrdonnees,

  ]);
  }
}
?>
