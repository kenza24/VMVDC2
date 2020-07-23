<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteAController extends Controller
{

  public function accueil(){
    if(isset($_SESSION['connecte']) and preg_match("#^administrateurs$#", $_SESSION['connecte']) and isset($_SESSION['id'])){
      $data = DB::table('administrateurs')->select('nom', 'prenom', 'email')->where('id', $_SESSION['id'])->get();
      //la personne est tojours connectée
      return view ('administrateurs', [
        'data' => $data
      ]);
    }

    return view('connexionE');
  }

  public function deconnexion()
  {
    if(isset($_SESSION['connecte'])){
      unset($_SESSION['connecte']);
    }

    return redirect ('/');
  }

  public function pageAjoutSession()
  {
    if (isset($_SESSION['connecte']) and $_SESSION['connecte'] == "administrateurs") {
      return view('ajoutSession');
    }
    return redirect('/orientationConnexion');
  }

  public function ajoutSession()
  {
    request()->validate([
      'jour'=>'required',
      'mois' => 'required',
      'heure' => 'required',
      'minute' => 'required',
      'effectifMax' => 'required'
    ]);

    $jour = request('jour');
    $mois = request('mois');
    $heure = request('heure');
    $minute = request('minute');
    $effectifMax = request('effectifMax');

    $jourH = htmlspecialchars($jour);
    $moisH = htmlspecialchars($mois);
    $heureH = htmlspecialchars($heure);
    $minuteH = htmlspecialchars($minute);
    $effectifH = htmlspecialchars($effectifMax);

    $resultat = DB::table('sessions')->insert(
      array('date' => $jourH."/".$moisH, 'heure' => $heureH.":".$minuteH, 'effectifMax' => $effectifH)
    );

    if($resultat) {
      return redirect ('administrateurs');
    }

    return redirect ('/inscriptionsA'); //probleme
  }


  public function details(){

    //TEST si un admin est connecte
    if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "administrateurs") {
      return redirect('/orientationConnexion');
    }

    request()->validate([
      'idSession'=>'required'
    ]);

    $idSession = request('idSession');

  //VERIFICATION si affichage possible
    if(isset(DB::table('sessions')->join('classes', 'classes.id', '=', 'sessions.idClasse')->where('sessions.id', $idSession)
    ->select('sessions.id', 'date', 'idClasse', 'details', 'effectifclasse', 'niveau')->get()[0])){

    //RECUPERATION informations en cas de NON MISE A JOUR de la page
      //recuperation informations de sessoins et classes pour la sesion en cours
        $session = DB::table('sessions')
        ->join('classes', 'classes.id', '=', 'sessions.idClasse')
        ->where('sessions.id', $idSession)
        ->select('sessions.id', 'date', 'idClasse', 'classes.idEnseignant', 'details', 'effectifclasse', 'niveau', 'nom')
        ->get()[0];
      //recuperation informations doctorant
        $doctorants = [];
        if(DB::table('participations_doctorants')->join('doctorants', 'participations_doctorants.idDoctorants', '=', 'doctorants.id')
          ->select('doctorants.email', 'doctorants.nom', 'doctorants.prenom')->where('idSession', $idSession)->get() != null){

            $doctorants = DB::table('participations_doctorants')
          ->join('doctorants', 'participations_doctorants.idDoctorants', '=', 'doctorants.id')
          ->select('email', 'nom', 'prenom')
          ->where('idSession', $idSession)
          ->get();
        }
      //recuperation informations enseignant
        $enseignant = [];
        if(isset(DB::table('enseignants')->select('email', 'nom', 'prenom')->where('id', $session->idEnseignant)->get()[0])){
          $enseignant = DB::table('enseignants')->select('email', 'nom', 'prenom')->where('id', $session->idEnseignant)->get()[0];
        }
      //récupération des fichiers de la session
        if (DB::table('fichiers_sessions')->select('fichiers', 'nomFichier')->where('idSession', $session->id)->get() != null) {
          $fichiers = DB::table('fichiers_sessions')->select('fichiers', 'nomFichier')->where('idSession', $session->id)->get();
        }

    //UPDATE de la page
      $details = request('details');

      //update details
        if (isset($details)) {
          $nbInsertions = DB::table('sessions')->where('id', $idSession)->update(array('details' => $details));
        }

      //Telechragement fichiers
        if (isset($_FILES['fichiers']) and !isset(DB::table('fichiers_sessions')->where('idSession', $idSession)->get()[0])) {
          //si des fichiers sont sélectionnés et qu'ils n'existent pas déjà
          $nbElmt = count($_FILES['fichiers']['name']);
          if ($_FILES['fichiers']['size'][0] != 0) { //si les fichiers n'ont pas une taille vide
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
                  else //Sinon (la fonction renvoie FALSE). //Si le telechargement n'as pas fonctionné
                  {
                    return view('detailSessionA', [
                      'session' => $session,
                      'doctorants' => $doctorants,
                      'enseignant' => $enseignant,
                      'fichiers' => $fichiers
                    ]);
                  }
                }
                else { //Si la taille est trop grosse
                  return view('detailSessionA', [
                    'session' => $session,
                    'doctorants' => $doctorants,
                    'enseignant' => $enseignant,
                    'fichiers' => $fichiers
                  ]);
                }
              }
              else { //Si l'extension n'est pas bonne
                return view('detailSessionA', [
                  'session' => $session,
                  'doctorants' => $doctorants,
                  'enseignant' => $enseignant,
                  'fichiers' => $fichiers
                ]);
              }
            }
          }
          //SUCCES du telechargement
        }

      //RECUPERATION des informations de la page en cas de MISE A JOUR
        //recuperation informations de sessoins et classes pour la sesion en cours
          $session = DB::table('sessions')
          ->join('classes', 'classes.id', '=', 'sessions.idClasse')
          ->where('sessions.id', $idSession)
          ->select('sessions.id', 'date', 'classes.idEnseignant', 'idClasse', 'details', 'effectifclasse', 'niveau', 'nom')
          ->get()[0];

        //recuperation informations doctorant
          $doctorants = [];
          if(DB::table('participations_doctorants')->join('doctorants', 'participations_doctorants.idDoctorants', '=', 'doctorants.id')
            ->select('email', 'nom', 'prenom')->where('idSession', $idSession)->get() != null){

              $doctorants = DB::table('participations_doctorants')
            ->join('doctorants', 'participations_doctorants.idDoctorants', '=', 'doctorants.id')
            ->select('email', 'nom', 'prenom')
            ->where('idSession', $idSession)
            ->get();
          }

        //recuperation informations enseignant
          $enseignant = [];
          if(isset(DB::table('enseignants')->select('email', 'nom', 'prenom')->where('id', $session->idEnseignant)->get()[0])){
            $enseignant = DB::table('enseignants')->select('email', 'nom', 'prenom')->where('id', $session->idEnseignant)->get()[0];
          }

        //récupération des fichiers de la session
          if (DB::table('fichiers_sessions')->select('fichiers', 'nomFichier')->where('idSession', $session->id)->get() != null) {
            $fichiers = DB::table('fichiers_sessions')->select('fichiers', 'nomFichier')->where('idSession', $session->id)->get();
          }

        return view('detailSessionA', [
          'session' => $session,
          'doctorants' => $doctorants,
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
}
