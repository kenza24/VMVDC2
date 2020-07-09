<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class accueilController extends Controller
{
    public function accueil()
    {
        $descriptifProjet = DB::table('informations')->get()[0]->descriptifProjet;
        $demarcheParticipation = DB::table('informations')->get()[0]->demarcheParticipation;

        return view('welcome', [
            'descriptifProjet' => $descriptifProjet,
            'demarcheParticipation' => $demarcheParticipation
        ]);
    }

    public function modificationAccueil()
    {
        $informations = DB::table('informations')->get()[0];
        $demarcheParticipation = $informations[0]->demarcheParticipation;
        $descriptifProjet = $informations[0]->descriptifProjet;

        return view('modificationAccueil', [
            'descriptifProjet' => $descriptifProjet,
            'demarcheParticipation' => $demarcheParticipation
        ]);
    }

    public function updateAccueil()
    {
        $descriptifProjet = request('descriptifProjet');
        $demarcheParticipation = request('demarcheParticipation');

        $resultat = DB::table('informations')->update(array('descriptifProjet' => $descriptifProjet));
        //dd($demarcheParticipation);
        $resultat = DB::table('informations')->update(array('demarcheParticipation' => $demarcheParticipation));

        return $this->accueil();
    }

    public function aPropos()
    {
        $aPropos = DB::table('aPropos')->get()[0];
        $equipeAdmin = $aPropos->equipeAdmin;
        $mentionsLegales = $aPropos->mentionsLegales;
        $equipeInfo = $aPropos->equipeInfo;
        $droits = $aPropos->droits;
        $conceptDesign = $aPropos->conceptDesign;
        $loiInformatiqueEtLiberte = $aPropos->loiInformatiqueEtLiberte;
        $descriptif = $aPropos->descriptif;

        return view('aPropos', [
            'equipeAdmin' => $equipeAdmin,
            'mentionsLegales' => $mentionsLegales,
            'equipeInfo' => $equipeInfo,
            'droits' => $droits,
            'conceptDesign' => $conceptDesign,
            'loiInformatiqueEtLiberte' => $loiInformatiqueEtLiberte,
            'descriptif' => $descriptif
        ]);
    }

    public function modificationAPropos()
    {
        $aPropos = DB::table('aPropos')->get()[0];
        $descriptif = $aPropos->descriptif;
        $equipeAdmin = $aPropos->equipeAdmin;
        $mentionsLegales = $aPropos->mentionsLegales;
        $equipeInfo = $aPropos->equipeInfo;
        $droits = $aPropos->droits;
        $conceptDesign = $aPropos->conceptDesign;
        $loiInformatiqueEtLiberte = $aPropos->loiInformatiqueEtLiberte;

        return view('modificationAPropos', [
            'descriptif' => $descriptif,
            'equipeAdmin' => $equipeAdmin,
            'mentionsLegales' => $mentionsLegales,
            'equipeInfo' => $equipeInfo,
            'droits' => $droits,
            'conceptDesign' => $conceptDesign,
            'loiInformatiqueEtLiberte' => $loiInformatiqueEtLiberte
        ]);
    }

    public function updateAPropos()
    {
        $descriptif = request('descriptif');
        $equipeAdmin = request('equipeAdmin');
        $mentionsLegales = request('mentionsLegales');
        $equipeInfo = request('equipeInfo');
        $droits = request('droits');
        $conceptDesign = request('conceptDesign');
        $loiInformatiqueEtLiberte = request('loiInformatiqueEtLiberte');

        $resultat = DB::table('APropos')->update(array('descriptif' => $descriptif));
        $resultat = DB::table('APropos')->update(array('equipeAdmin' => $equipeAdmin));
        $resultat = DB::table('APropos')->update(array('mentionsLegales' => $mentionsLegales));
        $resultat = DB::table('APropos')->update(array('equipeInfo' => $equipeInfo));
        $resultat = DB::table('APropos')->update(array('droits' => $droits));
        $resultat = DB::table('APropos')->update(array('conceptDesign' => $conceptDesign));
        $resultat = DB::table('APropos')->update(array('loiInformatiqueEtLiberte' => $loiInformatiqueEtLiberte));

        return $this->aPropos();
    }
}
