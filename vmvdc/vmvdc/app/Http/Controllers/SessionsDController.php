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

      $participations = DB::table('participations_doctorants')->select('selectionner', 'idSession')->get();
      //dd($participations);

      return view('sessionsD', [
          'sessions' => $sessions,
          //'doctorants'=>$doctorants,
          'participations'=>$participations
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
      $inscription = DB::table('participations_doctorants')->insert(array('idSession' => $idSession, 'idDoctorants' => $idDoctorant, 'selectionner'=> 1));

      return back();
  }

    public function desinscriptionDoctorant(){

      $idSession = request('idSession');
      $idDoctorant = $_SESSION['id'];
      $desinscription = DB::table('participations_doctorants')->where('idDoctorants', '=', $idDoctorant)->update(array('idSession' => null, 'idDoctorants'=>null, 'selectionner'=>null));

      return back();
  }



}
