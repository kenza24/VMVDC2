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
      //recuperation des infos de la sessions
      $sessions = DB::table('sessions')->select('date', 'id', 'heure', 'idClasse', 'effectifMax')->get();


      //$doctorants = DB::table('doctorants')->select('id')->where('id', $_SESSION['id'])->get();

      $participation = DB::table('participations_doctorants')->select('idSession')->get();

      return view('sessionsD', [
          'sessions' => $sessions,
        //   'doctorants'=>$doctorants,
          'participation'=>$participation,
      ]);
  }

    public function inscriptionDoctorant (){
      //sessions();
      $idSession = request('idSession');

      if (isset($_SESSION['id'])){
        $idDoctorant = $_SESSION['id'];
      }
      
      //$idDoctorant = request('idDoctorant');

      //$sessions = DB::table('sessions')->select('id')->get();
      //$doctorant = DB::table('doctorants')->select('id')->get();
      //dd("coucou");
      //ajout lors du cliquage du bouton dans la classe participations_doctorants
      $inscription = DB::table('participations_doctorants')->insert(array('idSession' => $idSession, 'idDoctorants' => $idDoctorant));

      return back();
  }

  public function desinscriptionDoctorant()
  {
      $idSession = request('idSession');

      $desinscription = DB::table('participations_doctorants')->where('id', '=', $idSession)->update(array('idSession' => null));

      return back();
  }

}
