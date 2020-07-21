<?php
namespace App\Http\Controllers;

session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailSessionDController extends Controller{

  public function details(){
    /*request()->validate([
      'idSession'=>'required'
    ]);

    $idSession = request('idSession');*/
    $idSession = 1;

    if(isset(DB::table('sessions')->join('classes', 'classes.id', '=', 'sessions.idClasse')->where('sessions.id', $idSession)
    ->select('sessions.id', 'date', 'classes.idEnseignant', 'idClasse', 'details', 'effectifclasse', 'niveau')->get()[0])){

      //recuperation informations de sessoins et classes pour la sesion en cours
      $session = DB::table('sessions')
        ->join('classes', 'classes.id', '=', 'sessions.idClasse')
        ->where('sessions.id', $idSession)
        ->select('sessions.id', 'date', 'classes.idEnseignant', 'idClasse', 'details', 'effectifclasse', 'niveau')
        ->get()[0];


      $details = request('details');
      //$id = request('id');
      //update de la case "details" avec ce que le doctorant en question a entré
      // dans la table session !! donc doit recuperer les infos de la session en question

      $sessions = DB::table('sessions')->select('id');

      foreach $sessions as $session {
        $detail = DB::table('sessions')->where ('id', '=', $sessions->id)->update(array('details'=>$details));
      }
      //$detail= DB::table('sessions')->where('id', '=', ])->update(array('details'=>$details));

      //dd($res);

      if (DB::table('fichiers_sessions')->select('fichiers', 'nomFichier')->where('idSession', $session->id)->get() != null) {
        $fichiers = DB::table('fichiers_sessions')->select('fichiers', 'nomFichier')->where('idSession', $session->id)->get();
      }
    }

    return view('detailSessionD', [
      'session' => $session,
      'enseignant' => $enseignant,
      'fichiers' => $fichiers
    ]);
  }


      public function ajoutFichier(){
        //sdd("cc");
        //echo("cc");
        //affiche le chemin du fichier
        $path=request('fichierD')->store('fichierD');
        $id=$_SESSION['id'];
        //dd($id);
        if (isset($_SESSION['id'])){
          $res=DB::table('doctorants')->where('id', '=', $id)->update(array('fichierD'=>$path));

        }
        //$id=DB::table('fichiers_sessions')->select('id');
        //chez le doctorant ajoute son fichier, donc where id=id
        //return $path;
        return back();
      }
  //il faut pouvoir afficher les données de la session en question
  /*public function infosEnseignant (){
    $enseignants = DB::table('enseignants')->select('id', 'nom', 'prenom', 'mail')->get();

  }*/

}
