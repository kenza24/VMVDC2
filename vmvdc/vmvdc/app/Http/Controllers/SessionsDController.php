<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionsDController extends Controller
{

  public function sessions()
  {
      //dd("coucou");
      $sessions = DB::table('sessions')->select('date', 'id', 'heure', 'idClasse', 'effectifMax')->get();
      return view('sessionsD', [
          'sessions' => $sessions,
      ]);
  }

    public function inscriptionDoctorant (){

      $idSession = request('idSession');
      $idDoctorant = request('idDoctorant');

      $sessions = DB::table('sessions')->select('id')->get();
      $doctorant = DB::table('doctorants')->select('id')->get();
      //dd("coucou");
      //ajout lors du cliquage du bouton dans la classe participations_doctorants
      $inscription = DB::table('participations_doctorants')->insert(array('idSession' => $idSession, 'idDoctorants'=>$idDoctorant));

      return view ('sessionsD');
  }

}
