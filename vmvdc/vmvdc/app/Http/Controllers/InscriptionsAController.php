<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionsAController extends Controller
{
    public function inscription() {
      
          request()->validate([
            'nomA' => 'required',
            'prenomA'=>'required',
            'emailA'=>'required',
            'mdpA' => 'required',
            'mdp-confirmationA' => 'required',
        ]);

        $nom = request('nomA');
        $prenom = request('prenomA');
        $email = request('emailA');
        $mdp = request('mdpA');
        $mdpConfirmation = request('mdp-confirmationA');

        if (isset($mdp) and isset($mdpConfirmation) and preg_match("#".$mdp."#", $mdpConfirmation)) {
            $resultat = DB::table('administrateurs')->insert(
                array('nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'mot_de_passe' => password_hash($mdp, PASSWORD_DEFAULT))
            );
            if($resultat) {
                $_SESSION['connecte'] = 'administrateurs';
                return redirect ('/administrateurs');
            }
        }
        return redirect ('/inscriptionsA');

    }

}
