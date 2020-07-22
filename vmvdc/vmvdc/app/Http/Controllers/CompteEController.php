<?php

namespace App\Http\Controllers;

session_start();

use App\Enseignants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteEController extends Controller
{

  public function accueil(){
    if(isset($_SESSION['connecte']) and preg_match("#^enseignant$#", $_SESSION['connecte']) and isset($_SESSION['id'])){
      $data = DB::table('enseignants')->select('nom', 'prenom', 'email')->where('id', $_SESSION['id'])->get();
      //la personne est tojours connectée
      return view ('enseignants', [
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

  public function sessions()
  {
    $etatValidation = DB::table('informations')->get()[0]->etatValidation;

    //RECUPERATION toutes les session avec l'id de l'enseignant comme idEnseignant
    $sessions = [];
    if(DB::table('sessions')->join('classes', 'sessions.idClasse', '=', 'classes.id')->where('classes.idEnseignant', $_SESSION['id'])
    ->select('nom', 'date', 'heure', 'doctorants', 'nb_accompagnateurs', 'effectifClasse', 'acceptation')->get() != null and $etatValidation == 1) {

      $sessions = DB::table('sessions')->join('classes', 'sessions.idClasse', '=', 'classes.id')
      ->where('classes.idEnseignant', $_SESSION['id'])->select('sessions.id', 'nom', 'date', 'heure', 'doctorants', 'nb_accompagnateurs', 'effectifClasse', 'acceptation')->get();
    }

    //LISTE DES DOCTORANTS pour chaque session
    $doctorantSession = [];
    foreach ($sessions as $session) {
      $doctorantSession[$session->id] = "";
      $doctorants = [];
      if (DB::table('participations_doctorants')->join('doctorants', 'participations_doctorants.idDoctorants', '=', 'doctorants.id')
      ->where('idSession', $session->id)->select('nom', 'prenom')->get() != null){

        $doctorants = DB::table('participations_doctorants')->join('doctorants', 'participations_doctorants.idDoctorants', '=', 'doctorants.id')
        ->where('idSession', $session->id)->select('nom', 'prenom')->get();
      }
      
      foreach ($doctorants as $doctorant) {
        $doctorantSession[$session->id] .= " - ".$doctorant->prenom." ".$doctorant->nom;
      }
    }

    return view ('sessionsE', [
      'sessions' => $sessions,
      'doctorantSession' => $doctorantSession,
      'etatValidation' => $etatValidation
    ]);
  }

  public function acceptation()
  {
    $idSession = request('idSession');
    $resultat = DB::table('sessions')->where('id', '=', $idSession)->update(array('acceptation' => 1));
    return back();
  }

  public function refus()
  {
    $idSession = request('idSession');
    $resultat = DB::table('sessions')->where('id', '=', $idSession)->update(array('acceptation' => 2));
    return back();
  }

  public function details(){
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
        ->select('sessions.id', 'date', 'idClasse', 'details', 'effectifclasse', 'niveau', 'nom')
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
        if (isset($_FILES['fichiers']) and !isset(DB::table('fichiers_sessions')->where('idSession', $idSession)->get()[0])) { //si des fichiers sont sélectionnés
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
                    return view('detailSessionE', [
                      'session' => $session,
                      'doctorants' => $doctorants,
                      'fichiers' => $fichiers
                    ]);
                  }
                }
                else { //Si la taille est trop grosse
                  return view('detailSessionE', [
                    'session' => $session,
                    'doctorants' => $doctorants,
                    'fichiers' => $fichiers
                  ]);
                }
              }
              else { //Si l'extension n'est pas bonne
                return view('detailSessionE', [
                  'session' => $session,
                  'doctorants' => $doctorants,
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
          ->select('sessions.id', 'date', 'idClasse', 'details', 'effectifclasse', 'niveau', 'nom')
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
          
        //récupération des fichiers de la session
          if (DB::table('fichiers_sessions')->select('fichiers', 'nomFichier')->where('idSession', $session->id)->get() != null) {
            $fichiers = DB::table('fichiers_sessions')->select('fichiers', 'nomFichier')->where('idSession', $session->id)->get();
          }

        return view('detailSessionE', [
          'session' => $session,
          'doctorants' => $doctorants,
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
