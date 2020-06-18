<?php
namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\DB;

class ConnexionControllerE extends Controller
{
    public function formulaire(){
      return view ('connexionE');
    }

    public function traitement(){
      request()->validate([
        'emailE'=>'required',
        'mdpE' => 'required'
      ]);

      //récupération des valeurs entrées
      $emailE = request('emailE');
      $mdpE = request('mdpE');

      $password = DB::table('enseignants')->select('mot_de_passe')->where('email', $emailE)->get();
      //récupération de l'objet de l'email contenant le hash du mot de passe

      //dd(password_hash($mdpE, PASSWORD_DEFAULT)."  |  ".$password[0]->mot_de_passe."  =  ".password_verify($mdpE, $password[0]->mot_de_passe));

      //récupération du hash dans l'objet et comparaison avec le mot de passe entré
      if (isset($password[0]->mot_de_passe) and password_verify($mdpE, $password[0]->mot_de_passe)) {
        $_SESSION['connecte'] = "enseignant";
        return redirect ('/enseignants');
      }
      
      return back()->withInput()->withErrors([
        'email'=>'Vos identifiants sont incorrectes'
      ]);//retourne a la page precedente (le formulaire si pas bon id)
      //with input -> pour renvoyer le formulaire avec l'email entrer*/

    }
}
