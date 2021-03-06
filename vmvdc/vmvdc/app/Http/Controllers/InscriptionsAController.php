<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionsAController extends Controller
{
    public function pageInscriptionsA()
    {
        //TEST si un administrateur est connecte
        if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "administrateurs") {
            return redirect('/orientationConnexion');
        }
        return view('inscriptionsA');
    }
    
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

        $nomH=htmlspecialchars($nom);
        $prenomH=htmlspecialchars($prenom);
        $emailH=htmlspecialchars($email);
        $mdpH=htmlspecialchars($mdp);
        $mdpCH=htmlspecialchars($mdpConfirmation);


        if (isset($mdp) and isset($mdpConfirmation) and preg_match("#".$mdp."#", $mdpConfirmation)) {
            $resultat = DB::table('administrateurs')->insert(
                array('nom' => $nomH, 'prenom' => $prenomH, 'email' => $emailH, 'mot_de_passe' => password_hash($mdpH, PASSWORD_DEFAULT))
            );
            if($resultat) {
                $_SESSION['connecte'] = 'administrateurs';
                return redirect ('/administrateurs');
            }
        }
        return redirect ('/inscriptionsA');

    }

}
