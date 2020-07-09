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
        $descriptifProjet = DB::table('informations')->get()[0]->descriptifProjet;
        $demarcheParticipation = DB::table('informations')->get()[0]->demarcheParticipation;

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
}
