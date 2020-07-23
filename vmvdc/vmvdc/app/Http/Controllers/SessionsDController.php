<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionsDController extends Controller
{

  public function sessions()
  {
    //TEST si un doctorant est connecte
    if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "doctorant") {
        return redirect('/orientationConnexion');
    }

      //recuperation des infos de la sessions
        $sessions = DB::table('sessions')->select('date', 'id', 'heure', 'idClasse', 'effectifMax')->get();

      //recuperation des infos pour par la suite verifier si le couple existe
      $d=$_SESSION['id'];
      $infosDoctorant = DB::table('participations_doctorants')->select('idSession', 'idDoctorants')->where('idDoctorants', '=', $d)->get();

      $idS = [];
      foreach ($infosDoctorant as $value) {
        //on recupere les idSession dans un nveau tableau

        array_push($idS, $value->idSession);
      }

      $participations = DB::table('participations_doctorants')->select('idSession')->get();


      return view('sessionsD', [
          'sessions' => $sessions,
          'infosDoctorant'=>$infosDoctorant,
          'idS'=>$idS,
          'participations'=>$participations,
      ]);
  }

    public function inscriptionDoctorant (){

      $idSession = request('idSession');

      if (isset($_SESSION['id'])){
        $idDoctorant = $_SESSION['id'];
      }

      $inscription = DB::table('participations_doctorants')->insert(array('idSession' => $idSession, 'idDoctorants' => $idDoctorant));

      return back();
  }

    public function desinscriptionDoctorant(){

      $idSession = request('idSession');
      $idDoctorant = $_SESSION['id'];

      $desinscription = DB::table('participations_doctorants')->where('idSession', '=', $idSession)->delete();

      return back();
  }



}
