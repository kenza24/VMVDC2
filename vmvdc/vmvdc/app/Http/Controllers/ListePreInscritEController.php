<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListePreInscritEController extends Controller
{
  public function affichage(){

  //affichage des infos pr les classesA
  $classes = DB::table("classes")
  ->where('idEnseignant', '=', $_SESSION['id'])
  ->select('etablissementScolaire', 'niveau', 'choixSession1', 'choixSession2', 'choixSession3')
  ->get();



  //dd($sessions);
 //$session=DB::table("sessions")->select('id', 'date', 'heure')->get();
  //dd($sessions);
  $sessions=DB::table('sessions')->select('date', 'heure', 'id')->get();

  $sessionsOrdonnees = [];
  foreach ($sessions as $keySession => $session) {
    $sessionsOrdonnees[$session->id] = $session;
  }
  //dd($sessionsOrdonnees);
  //$sessions=[];
/*  foreach($classes as $c){
    foreach($session as $s){
        //dd($s->id);
        if($s->id == $c->choixSession1 || $s->id == $c->choixSession2 || $s->id == $c->choixSession3){
          $uneClasse=$session[0];
          array_push($sessions, $uneClasse);
      }
    }
  }*/
  //dd($sessions);
/*
  foreach($classes as $c){
    $session1=DB::table("sessions")->where('id', '=', $c->choixSession1)->select('date', 'heure', 'idClasse')->get();
    $session2=DB::table("sessions")->where('id', '=', $c->choixSession2)->select('date', 'heure', 'idClasse')->get();
    $session3=DB::table("sessions")->where('id', '=', $c->choixSession3)->select('date', 'heure', 'idClasse')->get();
    $uneSession1 = $session1[0];
    $uneSession2 = $session2[0];
    array_push($sessions, $uneSession1);
    array_push($sessions, $uneSession2);
  //  array_push($sessions, $session3);
}*/
  //dd($sessions);
  return view('listePreInscritE', [
      'sessions' => $sessions,
      'classes' => $classes,
      'sessionsOrdonnees'=>$sessionsOrdonnees,

  ]);
  }
}
?>
