<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuppressionCompteEController extends Controller
{
  public function suppressionE(){

      //suppression du compte de l'enseignant
      $id = $_SESSION['id'];
      $desinscription = DB::table('enseignants')->where('id', '=', $id)->delete();

      //suppression des classes et sessions en lien avec lui
      $session = DB::table('sessions')->where('idEnseignant', '=', $id)->delete();
      $classe=DB::table('classes')->where('idEnseignant', '=', $id)->delete();

      return redirect('/');
  }


}
