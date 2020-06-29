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
          'date2'=> 'required',
          'etablissementScolaire'=>'required',
          'ville'=>'required',
          'niveau' => 'required',
          'codePostal' => 'required',
          'effectifClasse'=>'required',
          'date1'=> 'required',

      ]);

      $etablissement = request('etablissementScolaire');
      $ville = request('ville');
      $codePostal = request('codePostal');
      $niveau=request('niveau');
      $effectif=request('effectifClasse');
      $rep=request('rep');
      $date1=request('date1');
      $date2=request('date2');
      $academie=request('academie');

          //echo("coucou2");
          $resultat = DB::table('classes')->insert(
              array('etablissementScolaire' => $etablissement, 'ville' => $ville, 'niveau' => $niveau,
              'codePostal' => $codePostal, 'rep'=>$rep, 'choixDates1'=>$date1, 'choixDates2'=>$date2,'academie'=>$academie, 'effectifClasse'=>$effectif)
          );
          if($resultat) {
              $_SESSION['connecte'] = 'classes';
              return redirect ('/bienInscris');
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

      $sessions = DB::table('sessions')->select('date')->get();
      //print_r($sessions);
      //dd("$sessions");
      //$dates = [];
      foreach ($sessions as $val) {
        //dd($sessions);
        //$dates[$sessions->date]=$uneDate;
        foreach ($val as $key=>$date) {
          //echo $date; //print les dates
          for ($i = 0; $i <= count($date); $i++) {
            //echo("coucou");
            //echo $date[$i];
          }

        }

      return view('preInscriptionE',[
        'date'=> $date
      ]);

  }
}

}
