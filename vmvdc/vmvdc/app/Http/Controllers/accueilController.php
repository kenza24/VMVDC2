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
}
