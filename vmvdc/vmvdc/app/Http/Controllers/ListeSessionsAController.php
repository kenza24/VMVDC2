<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListeSessionsAController extends Controller
{

  public function sessionsA()
  {
    //TEST si un administrateur est connecte
    if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "administrateurs") {
        return redirect('/orientationConnexion');
    }
      
      $sessions = DB::table('sessions')->select('date', 'id', 'heure', 'idClasse', 'effectifMax')->get();
      return view('listeSessionsA', [
          'sessions' => $sessions,
      ]);
  }


}
