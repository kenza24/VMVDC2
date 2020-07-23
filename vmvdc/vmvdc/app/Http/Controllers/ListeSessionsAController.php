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

  public function suppressionSession()
  {
    $idSession = request('idSession');

    $update = DB::table('classes')->where('choixSession1', $idSession)->update(array('choixSession1' => null));
    $update = DB::table('classes')->where('choixSession2', $idSession)->update(array('choixSession2' => null));
    $update = DB::table('classes')->where('choixSession3', $idSession)->update(array('choixSession3' => null));
    $suppressions = DB::table('fichiers_sessions')->where('idSession', $idSession)->delete();
    $suppressions = DB::table('participations_doctorants')->where('idSession', $idSession)->delete();
    $suppressions = DB::table('sessions')->where('id', $idSession)->delete();

    return redirect('listeSessionsA');
  }


}
