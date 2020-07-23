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

      $etaHtml=htmlspecialchars($etablissement);
      $villeHtml=htmlspecialchars($ville);
      $codeHtml=htmlspecialchars($codePostal);
      $niveauHtml=htmlspecialchars($niveau);
      $nomCHtml=htmlspecialchars($nomClasse);
      $effectifHtml=htmlspecialchars($effectif);
      $repHtml=htmlspecialchars($rep);
      $date1Html=htmlspecialchars($date1);
      $date2Html=htmlspecialchars($date2);
      $date3Html=htmlspecialchars($date3);
      $academieHtml=htmlspecialchars($academie);
      $nbHtml=htmlspecialchars($nbAccompagnateurs);

      if (isset($_SESSION['id'])){
        $idEnseignant = $_SESSION['id'];
      }
      else {
        return redirect('/connexionE');
      }

          $resultat = DB::table('classes')->insert(
            array('etablissementScolaire' => $etaHtml, 'ville' => $villeHtml, 'niveau' => $niveauHtml,
            'codePostal' => $codeHtml, 'rep'=>$repHtml, 'choixSession1'=>$date1Html, 'choixSession2'=>$date2Html, 'choixSession3'=>$date3Html,
            'academie'=>$academieHtml, 'effectifClasse'=>$effectifHtml, 'nb_accompagnateurs'=>$nbHtml, 'idEnseignant' => $idEnseignant, 'dejaVenu' => 0, 'nom' => $nomCHtml)
          );

          if($resultat) {
              return redirect ('listePreInscritE');
          }

      return redirect ('/preInscriptionE');

  }


  public function session()
  {
    //TEST si un enseignant est connecte
    if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "enseignant") {
        return redirect('/orientationConnexion');
    }

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
