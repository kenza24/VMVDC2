<?php
namespace App\Http\Controllers;

session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailSessionDController extends Controller{

  public function details(){
    //dd("coucou");
    //dd($_SESSION['id']);

     request()->validate([
        'details'=>'required',
      ]);


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

      return view('detailSessionD', [
          'details' => $details,
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
