<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inscriptionEController extends Controller
{
    public function inscription() {

        request()->validate([
            'nom' => 'required',
            'prenom'=>'required',
            'tel'=>'required',
            'email'=>'required',
            'mdp' => 'required',
            'mdp-confirmation' => 'required',
        ]);

        $nom = request('nom');
        $prenom = request('prenom');
        $tel = request('tel');
        $email = request('email');
        $mdp = request('mdp');
        $mdpConfirmation = request('mdp-confirmation');

        if (isset($mdp) and isset($mdpConfirmation) and preg_match("#".$mdp."#", $mdpConfirmation)) {
            $resultat = DB::table('enseignants')->insert(
                array('nom' => $nom, 'prenom' => $prenom, 'numTel' => $tel, 'email' => $email, 'mot_de_passe' => password_hash($mdp, PASSWORD_DEFAULT), 'age' => 0)
            );
            if($resultat) {
                $_SESSION['connecte'] = 'enseignant';
                return redirect ('/enseignants');
            }            
        }
        return redirect ('/inscriptionE');

    }

}
