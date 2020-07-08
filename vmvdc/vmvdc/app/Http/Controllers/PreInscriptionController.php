<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreInscriptionController extends Controller
{
  public function preInscription(){
    //dd("coucou");
        request()->validate([
          //'date2'=> 'required',
          'etablissementScolaire'=>'required',
          'ville'=>'required',
          'niveau' => 'required',
          'codePostal' => 'required',
          'effectifClasse'=>'required',
          //'date1'=> 'required',
          //'date3'=>'required',
          'nbAccompagnateurs'=>'required',
      ]);

      $etablissement = request('etablissementScolaire');
      $ville = request('ville');
      $codePostal = request('codePostal');
      $niveau=request('niveau');
      $effectif=request('effectifClasse');
      $rep=request('rep');
      $date1=request('date1');
      $date2=request('date2');
      $date3=request('date3');
      $academie=request('academie');
      $nbAccompagnateurs=request('nbAccompagnateurs');
      if (isset($_SESSION['id'])){
        $idEnseignant = $_SESSION['id'];
      }
      else {
        return redirect('/connexionE');
      }

          $resultat = DB::table('classes')->insert(
            array('etablissementScolaire' => $etablissement, 'ville' => $ville, 'niveau' => $niveau,
            'codePostal' => $codePostal, 'rep'=>$rep, 'choixSession1'=>$date1, 'choixSession2'=>$date2, 'choixSession3'=>$date3,
            'academie'=>$academie, 'effectifClasse'=>$effectif, 'nb_accompagnateurs'=>$nbAccompagnateurs, 'idEnseignant' => $idEnseignant, 'dejaVenu' => 0)
          );
          
          if($resultat) {
              $_SESSION['connecte'] = 'classes';
              return redirect ('sessionsE');
          }

      return redirect ('/preInscriptionE');

  }

  /*
  public function session()
  {
      $sessions = DB::table('sessions')->select('date', 'id')->get();

      $dates = [];
      foreach ($sessions as $session) {
          $dates[$session->id] = 0;
          $sessions[$session->id] = $session;
      }

      //dd($dates);

      return view('preInscriptionE', [
          'sessions'=>$sessions,
          'dates' => $dates

      ]);
  }*/

  public function session()
  {

    $sessions = DB::table('sessions')->select('date', 'id', 'heure', 'effectifMax')->get();

    $dates = [];
    foreach ($sessions as $session) {
      $dates[$session->id] = $session->date." - ".$session->heure. " - effectif max : ". $session->effectifMax;
    }
    asort($dates);

    return view('preInscriptionE',[
      'dates'=> $dates
    ]);
  }

}
