<?php
namespace App\Http\Controllers;

session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class DetailSessionDController extends Controller{

  public function details(){
    request()->validate([
      'idSession'=>'required'
    ]);

    $idSession = request('idSession');

    if(isset(DB::table('sessions')->join('classes', 'classes.id', '=', 'sessions.idClasse')->where('sessions.id', $idSession)
    ->select('sessions.id', 'date', 'classes.idEnseignant', 'idClasse', 'details', 'effectifclasse', 'niveau')->get()[0])){
      //recuperation informations de sessoins et classes pour la sesion en cours
      $session = DB::table('sessions')
        ->join('classes', 'classes.id', '=', 'sessions.idClasse')
        ->where('sessions.id', $idSession)
        ->select('sessions.id', 'date', 'classes.idEnseignant', 'idClasse', 'details', 'effectifclasse', 'niveau')
        ->get()[0];
      //recuperation informations enseignant
      $enseignant = [];
      if(isset(DB::table('enseignants')->select('email', 'nom', 'prenom')->where('id', $session->idEnseignant)->get()[0])){
        $enseignant = DB::table('enseignants')->select('email', 'nom', 'prenom')->where('id', $session->idEnseignant)->get()[0];
      }
      //récupération des fichiers de la session
      if (DB::table('fichiers_sessions')->select('fichiers', 'nomFichier')->where('idSession', $session->id)->get() != null) {
        $fichiers = DB::table('fichiers_sessions')->select('fichiers', 'nomFichier')->where('idSession', $session->id)->get();
      }

      return view('detailSessionD', [
        'session' => $session,
        'enseignant' => $enseignant,
        'fichiers' => $fichiers
      ]);
    }

    return back();
  }

  public function telechargement()
  {
    //téléchragement du fichier sélectionné
    $chemin = request('chemin');

    if (file_exists($chemin)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($chemin).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($chemin));
        readfile($chemin);
        exit;
    }
  }

  public function update()
  {
    $idSession = request('idSession');

    $nbElmt = count($_FILES['fichiers']['name']);
    if ($_FILES['fichiers']['size'][0] != 0) {
      $dossier = 'content/documents/session_'.$idSession;
      if(!is_dir($dossier)) {
        mkdir($dossier);
      }
      $taille_maxi = 100000000;
      $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.pdf', '.docx', '.doc', '.txt', '.xls', '.xlsx', '.pptx', '.ppt', '.odp', '.xml', '.rtf');
      for ($i=0; $i < $nbElmt; $i++) {
        $nomFichier = basename($_FILES['fichiers']['name'][$i]);
        $tailleFichier = filesize($_FILES['fichiers']['tmp_name'][$i]);
        $extension = strrchr($_FILES['fichiers']['name'][$i], '.');
        //Début des vérifications de sécurité...
        if(in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
          if($tailleFichier <= $taille_maxi)
          {
            //On formate le nom du fichier ici...
            $nomFichier = strtr($nomFichier,
              'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
              'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $nomFichier = preg_replace('/([^.a-z0-9]+)/i', '-', $nomFichier);
            if(move_uploaded_file($_FILES['fichiers']['tmp_name'][$i], $dossier . '/' . $nomFichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
              $nbInsertions = DB::table('fichiers_sessions')->insert(array('idSession' => $idSession, 'fichiers' => $dossier . '/' . $nomFichier, 'nomFichier' => $nomFichier));
            }
            else //Sinon (la fonction renvoie FALSE).
            {
              return back();
            }
          }
          else {
            return back();
          }
        }
        else {
          return back();
        }
      }
    }
    return back();
  }
}
