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
          'etablissementScolaire'=>'required',
          'ville'=>'required',
          'niveau' => 'required',
          'codePostal' => 'required',
      ]);

      $etablissement = request('etablissementScolaire');
      $ville = request('ville');
      $codePostal = request('codePostal');
      $niveau=request('niveau');


      //A MODIFIER

          //echo("coucou2");
          $resultat = DB::table('classes')->insert(
              array('etablissementScolaire' => $etablissement, 'ville' => $ville, 'niveau' => $niveau, 'codePostal' => $codePostal)
          );
          if($resultat) {
              $_SESSION['connecte'] = 'classes';
              return redirect ('/bienInscris');
          }

      return redirect ('/preInscriptionE');


  }





}
