<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class listesAController extends Controller
{
    public function classes()
    {
        $sessions = DB::table('sessions')->select('id', 'date', 'heure')->get();

        $dates = [];
        foreach ($sessions as $session) {
            $dates[$session->id] = 0;
            $sessions[$session->id] = $session;
        }

        $classes = DB::table('classes')->orderBy('dateSession', 'desc')->orderBy('niveau', 'desc')->get();
        $enseignants = [];
        foreach ($classes as $classe) {
            $unEnseignant = DB::table('enseignants')->select('nom', 'prenom')->where('id', $classe->idEnseignant)->get();
            $dates[$classe->choixSession1]++;
            $dates[$classe->choixSession2]++;
            $enseignants[$classe->idEnseignant] = $unEnseignant[0]->prenom." ".$unEnseignant[0]->nom;
        }

        //dd($sessions);
        //dd($dates);
        asort($dates);
        //dd($dates);

        return view('classesA', [
            'sessions' => $sessions,
            'dates' => $dates,
            'classes' => $classes,
            'enseignants' => $enseignants
        ]);
    }

    public function sessions()
    {
        $sessions = DB::table('sessions')->select('date', 'id', 'nombreEleves', 'idEnseignant')->get();

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
        foreach ($sessions as $value) {
            $unEnseignant = DB::table('enseignants')->select('nom', 'prenom')->where('id', $value->idEnseignant)->get();
            $enseignants[$value->idEnseignant] = $unEnseignant[0]->prenom." ".$unEnseignant[0]->nom;
        }

        return view('sessionsA', [
            'sessions' => $sessions,
            'enseignants' => $enseignants,
            'infoDoctorants' => $infoDoctorants
        ]);
    }

    public function doctorants()
    {
        $doctorants = DB::table('doctorants')->get();
        return view('listeDoctorantsA', [
            'doctorants' => $doctorants
        ]);
    }

    public function enseignants()
    {
        $enseignants = DB::table('enseignants')->get();
        return view('listeEnseignantsA', [
            'enseignants' => $enseignants
        ]);
    }
}
