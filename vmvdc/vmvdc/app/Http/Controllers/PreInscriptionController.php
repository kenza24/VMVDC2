<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreInscriptionController extends Controller
{
  public function preInscription(){

        request()->validate([
          'etablissementScolaire'=>'required',
          'ville'=>'required',
          'niveau' => 'required',
          'codePostal' => 'required',
          'effectifClasse'=>'required',
          'nbAccompagnateurs'=>'required',
      ]);

      $etablissement = request('etablissementScolaire');
      $ville = request('ville');
      $codePostal = request('codePostal');
      $niveau=request('niveau');
      $nomClasse = request('nomClasse');
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
            'academie'=>$academie, 'effectifClasse'=>$effectif, 'nb_accompagnateurs'=>$nbAccompagnateurs, 'idEnseignant' => $idEnseignant, 'dejaVenu' => 0, 'nom' => $nomClasse)
          );

          if($resultat) {
              return redirect ('listePreInscritE');
          }

      return redirect ('/preInscriptionE');

  }


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
