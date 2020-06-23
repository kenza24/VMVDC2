<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnseignantsController extends Controller{

  public function voir()
  {
    $email = request('email');
    $enseignants = Enseignants::where('email', $email)->first();
    dump($enseignants);
  }



}
