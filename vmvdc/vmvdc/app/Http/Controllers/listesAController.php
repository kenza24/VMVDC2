<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class listesAController extends Controller
{
    public function selectionClasse()
    {
        $idClasse = request('idClasse');
        $idSession = request('idSession');

        $classe = DB::table('classes')->select('idEnseignant')->where('id', $idClasse)->get()[0];

        $colore = DB::table('sessions')->where('id', '=', $idSession)->update(array('idEnseignant' => $classe->idEnseignant, 'idClasse' => $idClasse));

        return back();
    }

    public function deselectionClasse()
    {
        $idSession = request('idSession');

        $colore = DB::table('sessions')->where('id', '=', $idSession)->update(array('idClasse' => null));

        return back();
    }

    public function validationSessions()
    {
        $validation = DB::table('informations')->update(array('etatValidation' => 1));

        return back();
    }

    public function invalidationSessions()
    {
        $validation = DB::table('informations')->update(array('etatValidation' => 0));

        return back();
    }

    public function accueilSession()
    {
        $idAdmin = request('idAdmin');
        $idSession = request('idSession');
        $validation = DB::table('sessions')->where('id', $idSession)->update(array('idAdminReferent' => $idAdmin));

        return back();
    }

    public function desistementSession()
    {
        $idAdmin = request('idAdmin');
        $idSession = request('idSession');
        $validation = DB::table('sessions')->where('id', $idSession)->update(array('idAdminReferent' => null));

        return back();
    }

    public function classes()
    {
        if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "administrateurs") {
            return redirect('/orientationConnexion');
        }

        $sessions = DB::table('sessions')->select('id', 'date', 'heure', 'idClasse')->get();

        $dates = [];
        $listeNoire = []; //Stocke les id de classes déjà sélectionnée qu'on affiche pas
        $nbClasses = 0; //nombre de classes sélectionnées
        $nbREP = 0;
        $nbTerminales = 0;
        $nbPremieres = 0;
        $lycees = [];
        $academies = array('versailles' => 0, 'creteil' => 0, 'paris' => 0);
        foreach ($sessions as $session) {
            $dates[$session->id] = 0; //compteur du nombre de demande à une session

            $sessions[$session->id] = $session;// pour pouvoir sélectionner les information d'une session grace a son id

            //mise a jour des compteur pour les classes sélectionnées
            if ($session->idClasse != null) {
                array_push($listeNoire, $session->idClasse);

                $classe = DB::table('classes')->select('etablissementScolaire', 'academie', 'rep', 'niveau')->where('id', $session->idClasse)->get();

                $nbClasses++;

                if (!isset($lycees[$classe[0]->etablissementScolaire])) {
                    $lycees[$classe[0]->etablissementScolaire] = 1;
                }
                else{
                    $lycees[$classe[0]->etablissementScolaire]++;
                }
                if (preg_match("#rep#", $classe[0]->rep)) {
                    $nbREP++;
                }
                if (preg_match("#terminale#", $classe[0]->niveau)) {
                    $nbTerminales++;
                }
                elseif (preg_match("#premiere#", $classe[0]->niveau)) {
                    $nbPremieres++;
                }
                $academies[$classe[0]->academie]++;
            }
        }

        $classes = DB::table('classes')->orderBy('rep', 'desc')->orderBy('niveau', 'desc')->get();
        //order by sert a placer les rep au dessus des non rep et les terminales au desssus des premiere
        if (!empty($classes)){
            $enseignants = [];
            foreach ($classes as $classe) {
                $unEnseignant = DB::table('enseignants')->select('nom', 'prenom')->where('id', $classe->idEnseignant)->get();
                if (isset($unEnseignant[0]->prenom) and isset($unEnseignant[0]->nom)){
                    $enseignants[$classe->idEnseignant] = $unEnseignant[0]->prenom." ".$unEnseignant[0]->nom;
                }
                else{
                    $enseignants[$classe->idEnseignant] ="- -";
                }
                //incrémentation du nombre de demandes pour un session
                if($classe->choixSession1 != null and isset($classe->id) and !in_array($classe->id, $listeNoire)) {
                    $dates[$classe->choixSession1]++;
                }
                if($classe->choixSession2 != null and isset($classe->id) and !in_array($classe->id, $listeNoire)) {
                    $dates[$classe->choixSession2]++;
                }
                if($classe->choixSession3 != null and isset($classe->id) and !in_array($classe->id, $listeNoire)) {
                    $dates[$classe->choixSession3]++;
                }
            }
        }
        $etatValidation = DB::table('informations')->select('etatValidation')->get();

        asort($dates); //on trie de tableau pour avoir en premier les sessions avec le moins de demandes

        return view('classesA', [
            'sessions' => $sessions,
            'listeNoire' => $listeNoire,
            'lycees' => $lycees,
            'academies' => $academies,
            'nbClasses' => $nbClasses,
            'nbREP' => $nbREP,
            'nbTerminales' => $nbTerminales,
            'nbPremieres' => $nbPremieres,
            'dates' => $dates,
            'classes' => $classes,
            'enseignants' => $enseignants,
            'etatSessions' => $etatValidation[0]->etatValidation
        ]);
    }

    public function preInscriptions()
    {
        $classes = DB::table('classes')->get();
        $sessions = DB::table('sessions')->select('id', 'date', 'heure', 'idClasse')->get();

        $enseignants = [];
        foreach ($classes as $classe) {
            $unEnseignant = DB::table('enseignants')->select('nom', 'prenom')->where('id', $classe->idEnseignant)->get();
            $enseignants[$classe->idEnseignant] = $unEnseignant[0]->prenom." ".$unEnseignant[0]->nom;
        }

        $sessionsOrdonnees = [];
        foreach ($sessions as $keySession => $session) {
            $sessionsOrdonnees[$session->id] = $session;
        }

        return view('preInscriptionsA', [
            'classes' => $classes,
            'enseignants' => $enseignants,
            'sessionsOrdonnees' => $sessionsOrdonnees
        ]);
    }

    public function sessions()
    {
        //TEST si un administrateur est connecte
        if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "administrateurs") {
            return redirect('/orientationConnexion');
        }

        $sessions = DB::table('sessions')->join('classes', 'classes.id', '=', 'sessions.idClasse')->select('date', 'sessions.id', 'idClasse', 'idAdminReferent', 'effectifClasse', 'acceptation')->get();

        $infoDoctorants = [];
        //on recup un tableau de couple (idSession/idDoctorants)
        foreach ($sessions as $value) {
            $sessionDoctorant = DB::table('participations_doctorants')->where('idSession', $value->id)->get();

            //pour chq couple, on crée une 'case' dans le tableau $doctorants
            //Une case = idSession, nomDoctorant et prenomDoctorant
            foreach ($sessionDoctorant as $value) {
                $tmp['idSession'] = $value->idSession;
                $unDoctorant = DB::table('doctorants')->select('nom', 'prenom')->where('id', $value->idDoctorants)->get();
                $tmp['nom'] = $unDoctorant[0]->nom;
                $tmp['prenom'] = $unDoctorant[0]->prenom;
                array_push($infoDoctorants, $tmp);
            }
        }

        $enseignants = [];
        $accompagnateurs = [];
        $administrateurReferent = [];
        $acceptation = [];
        foreach ($sessions as $session) {
            $objetClasse = DB::table('classes')->select('nb_accompagnateurs', 'acceptation')->where('id', $session->idClasse)->get();
            if (!isset($objetClasse[0])) {
                $accompagnateurs[$session->id] = null;
            }
            else {
                $accompagnateurs[$session->id] = $objetClasse[0]->nb_accompagnateurs;
            }
            if ($session->idClasse == null) {
                $enseignants[$session->id] = "";
            }
            else {
                $objetClasse = DB::table('classes')->select('idEnseignant')->where('id', $session->idClasse)->get();
                if (!isset($objetClasse[0])) {
                    dd('Il y a un probleme des l\'id des classes');
                }
                $objetEnseignant = DB::table('enseignants')->select('nom', 'prenom')->where('id', $objetClasse[0]->idEnseignant)->get();
                $enseignants[$session->id] = "";
                if (isset($objetEnseignant[0])) {
                    $enseignants[$session->id] = $objetEnseignant[0]->prenom." ".$objetEnseignant[0]->nom;
                }
            }
            $administrateurReferent[$session->id] = "";
            if (isset(DB::table('administrateurs')->select('nom', 'prenom')->where('id', $session->idAdminReferent)->get()[0])){
                $admin = DB::table('administrateurs')->select('nom', 'prenom')->where('id', $session->idAdminReferent)->get()[0];
                $administrateurReferent[$session->id] = $admin->prenom." ".$admin->nom;
            }
        }

        return view('sessionsA', [
            'sessions' => $sessions,
            'accompagnateurs' => $accompagnateurs,
            'enseignants' => $enseignants,
            'infoDoctorants' => $infoDoctorants,
            'administrateur' => $administrateurReferent
        ]);
    }

    public function doctorants()
    {
        //TEST si un administrateur est connecte
        if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "administrateurs") {
            return redirect('/orientationConnexion');
        }

        $doctorants = DB::table('doctorants')->get();
        return view('listeDoctorantsA', [
            'doctorants' => $doctorants
        ]);
    }

    public function enseignants()
    {
        //TEST si un administrateur est connecte
        if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "administrateurs") {
            return redirect('/orientationConnexion');
        }

        $enseignants = DB::table('enseignants')->get();
        return view('listeEnseignantsA', [
            'enseignants' => $enseignants
        ]);
    }
  
}
