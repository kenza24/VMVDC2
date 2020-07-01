<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteAController extends Controller
{

      public function accueil(){
        if(isset($_SESSION['connecte']) and preg_match("#^administrateurs$#", $_SESSION['connecte']) and isset($_SESSION['id'])){
          $data = DB::table('administrateurs')->select('nom', 'prenom', 'email')->where('id', $_SESSION['id'])->get();
          //la personne est tojours connectée
          return view ('administrateurs', [
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

      public function ajoutSession()
      {
        request()->validate([
          'jour'=>'required',
          'mois' => 'required',
          'heure' => 'required',
          'minute' => 'required'
        ]);        

        if (!isset($_POST['effectifMax'])){
          $jour = request('jour');
          $mois = request('mois');
          $heure = request('heure');
          $minute = request('minute');

          $resultat = DB::table('sessions')->insert(
            array('date' => $jour."/".$mois, 'heure' => $heure.":".$minute)
          );
        }
        else {
          $jour = request('jour');
          $mois = request('mois');
          $heure = request('heure');
          $minute = request('minute');
          $effectifMax = request('effectifMax');
          $resultat = DB::table('sessions')->insert(
            array('date' => $jour."/".$mois, 'heure' => $heure.":".$minute, 'effectifMax' => $effectifMax)
          );
        }

        if($resultat) {
          return redirect ('administrateurs');
        }

        return redirect ('/inscriptionsA'); //probleme
      }
}
