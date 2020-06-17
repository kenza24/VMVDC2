<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testController extends Controller
{
    public function inscription() {

        /*request()->validate([
            'emailE'=>'required',
            'mdpE' => 'required',
        ]);

        $email = request('emailE');
        $password = request('mdpE');

        $admin = new Admin();
        $admin->email = $email;
        $admin->password = password_hash($password, PASSWORD_DEFAULT);
        $admin->save();

        $admins = Admin::all();

        return view('welcome', [
            'admins' => $admins
        ]);*/
    }

    public function connexion(){
        request()->validate([
            'emailE'=>'required',
            'mdpE' => 'required'
          ]);
    
        $emailE = request('emailE');
        $mdpE = request('mdpE');

        $password = DB::table('enseignants')->select('mot_de_passe')->where('email', $emailE)->get();

        if (password_verify($mdpE, $password[0]->mot_de_passe)) {
            return redirect ('/');
        }

          dd('False');
    }

    public function list(){

        /*$admins = Admin::all();

        return view('welcome', [
            'admins' => $admins
        ]);*/
    }
}
