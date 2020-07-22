<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionsDController extends Controller
{
    public function inscription() {
      
          request()->validate([
            'nomD' => 'required',
            'prenomD'=>'required',
            'emailD'=>'required',
            'mdpD' => 'required',
            'mdp-confirmationD' => 'required',
        ]);

        $nom = request('nomD');
        $prenom = request('prenomD');
        $email = request('emailD');
        $mdp = request('mdpD');
        $mdpConfirmation = request('mdp-confirmationD');

        if (isset($mdp) and isset($mdpConfirmation) and preg_match("#".$mdp."#", $mdpConfirmation)) {
            //echo("coucou");
            $resultat = DB::table('doctorants')->insert(
                array('nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'mot_de_passe' => password_hash($mdp, PASSWORD_DEFAULT))
            );
            if($resultat) {
                $_SESSION['connecte'] = 'doctorants';
                return redirect ('/doctorants');
            }
        }
        return redirect ('/inscriptionsD');

    }

}
