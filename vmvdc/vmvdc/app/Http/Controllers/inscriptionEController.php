<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inscriptionEController extends Controller
{
    public function pageInscriptionE()
    {
        //TEST si un administrateur est connecte
        if(!isset($_SESSION['connecte']) or $_SESSION['connecte'] != "administrateurs") {
            return redirect('/orientationConnexion');
        }
        return view('inscriptionE');
    }

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

        $nomH=htmlspecialchars($nom);
        $prenomH=htmlspecialchars($prenom);
        $telH=htmlspecialchars($tel);
        $emailH=htmlspecialchars($email);
        $mdpH=htmlspecialchars($mdp);
        $mdpCH=htmlspecialchars($mdpConfirmation);

        $listeEmails = [];
        if (null != DB::table('enseignants')->select('email')->get()) {
            $desEmails = DB::table('enseignants')->select('email')->get();
            foreach ($desEmails as $unEmail) {
                array_push($listeEmails, $unEmail->email);
            }
        }

        if (isset($mdp) and isset($mdpConfirmation) and preg_match("#".$mdp."#", $mdpConfirmation) and !in_array($email, $listeEmails)) {
            $resultat = DB::table('enseignants')->insert(
                array('nom' => $nomH, 'prenom' => $prenomH, 'numTel' => $telH, 'email' => $emailH, 'mot_de_passe' => password_hash($mdpH, PASSWORD_DEFAULT), 'age' => 0)
            );
            if($resultat) {
                $id = null;
                if (isset(DB::table('enseignants')->where('email', $email)->get()[0]->id)){
                    $id = DB::table('enseignants')->where('email', $email)->get()[0]->id;
                }
                $_SESSION['connecte'] = 'enseignant';
                $_SESSION['id'] = $id;
                return redirect ('/enseignants');
            }
        }
        return redirect ('/inscriptionE');

    }

}
