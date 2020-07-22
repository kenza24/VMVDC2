<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuppressionCompteController extends Controller
{
  public function suppressionE(){

      //suppression du compte de l'enseignant apr lui même
      $id = $_SESSION['id'];
      $suppression = DB::table('enseignants')->where('id', '=', $id)->delete();

      //suppression des classes et sessions en lien avec lui
      $session = DB::table('sessions')->where('idEnseignant', '=', $id)->delete();
      $classe=DB::table('classes')->where('idEnseignant', '=', $id)->delete();

      return redirect('/');
  }

  public function suppressionEAdmin(){

    //suppression de l'enseignant par les admin
    $idE = request('idE');
    $suppression = DB::table('enseignants')->where('id', '=', $idE)->delete();
    //dd($suppression);
    $session = DB::table('sessions')->where('idEnseignant', '=', $idE)->delete();
    $classe=DB::table('classes')->where('idEnseignant', '=', $idE)->delete();
    return back();
  }

  public function suppressionD(){
    //suppression du compte de l'enseignant apr lui même
    $id = $_SESSION['id'];
    $suppression = DB::table('doctorants')->where('id', '=', $id)->delete();

    //suppression des classes et sessions en lien avec lui
    $session = DB::table('participations_doctorants')->where('idDoctorants', '=', $id)->delete();


    return redirect('/');

  }
  public function suppressionDAdmin(){

    //suppression de l'enseignant par les admin
    $idD = request('idD');
    $suppression = DB::table('doctorants')->where('id', '=', $idD)->delete();
    //dd($suppression);
    $session = DB::table('participations_doctorants')->where('idDoctorants', '=', $idD)->delete();

    return back();
  }
}
