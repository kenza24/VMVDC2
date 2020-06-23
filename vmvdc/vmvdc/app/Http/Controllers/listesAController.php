<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class listesAController extends Controller
{
    public function classes()
    {
        $classes = DB::table('classes')->get();
        $enseignants = [];
        foreach ($classes as $key => $value) {
            $unEnseignant = DB::table('enseignants')->select('nom', 'prenom')->where('id', $value->idEnseignant)->get();
            $enseignants[$value->idEnseignant] = $unEnseignant[0]->prenom." ".$unEnseignant[0]->nom;
        }
        return view('classesA', [
            'classes' => $classes,
            'enseignants' => $enseignants
        ]);
    }

    public function sessions()
    {
        $sessions = DB::table('sessions')->select('date', 'id', 'nombreEleves', 'idEnseignant')->get();
        /*var_dump('sessions : ');
        print_r($sessions);*/

        $infoDoctorants = [];
        //on recup un tableau de couple (idSession/idDoctorants)
        foreach ($sessions as $value) {
            $sessionDoctorant = DB::table('participations_doctorants')->where('idSession', $value->id)->get();
            
            //pour chq couple, on crée une 'case' dans le tableau $doctorants
            //Une case = idSession, nomDoctorant et prenomDoctorant
            foreach ($sessionDoctorant as $value) {
                $tmp['idSession'] = $value->idSession;
                //var_dump("tmp[idSession] : ".$tmp['idSession']);
                $unDoctorant = DB::table('doctorants')->select('nom', 'prenom')->where('id', $value->idDoctorants)->get();
                $tmp['nom'] = $unDoctorant[0]->nom;
                //var_dump("tmp[nom] : ".$tmp['nom']);
                $tmp['prenom'] = $unDoctorant[0]->prenom;
                //var_dump("tmp[prenom] : ".$tmp['prenom']);
                array_push($infoDoctorants, $tmp);
            }
            /*var_dump("infodoctorants : ");
            print_r($infoDoctorants);*/
        }
        //var_dump("sessionDoctorant : ".$sessionDoctorant);

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
        return view('doctorantsA', [
            'doctorants' => $doctorants
        ]);
    }

    public function enseignants()
    {
        $enseignants = DB::table('enseignants')->get();
        return view('enseignantsA', [
            'enseignants' => $enseignants
        ]);
    }
}
