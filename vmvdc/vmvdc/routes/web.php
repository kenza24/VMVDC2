<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/creationCompteE', function(){
  return view ('creationCompteE');
});

Route::get('/inscriptions', function(){
  return view('inscriptions');
});

Route::post('creationCompteE', function(){
  $enseignant = new App\Enseignants;

  $enseignant->email = request ('email');
  $enseignant->mot_de_passe = bcrypt(request('mdp'));
  $enseignant->nom = request ('nom');
  $enseignant->prenom = request ('prenom');
  $enseignant->age = request ('age');
  $enseignant->numTel=request('tel');

  $enseignant->save();

  return 'Nous avons recu votre mail qui est : ' . request('email');
//  return 'Formulate recu';
});
