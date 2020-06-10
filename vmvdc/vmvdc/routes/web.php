<?php

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

//taper accueil dans l'url -> permet d'avoir la page d'accueil
Route::get('/accueil', function()
{
     return View::make('accueil');
});

Route::get('/inscriptions', function(){
  return view('inscriptions');
});

Route::post('inscriptions', function(){
  $enseignant = new App\Enseignants;
  $enseignant->email = request ('email');
  $enseignant->mot_de_passe = bcrypt(request('password'));

  $enseignant->save();
  return 'Nous avons recu votre mail qui est : ' . request('email');
//  return 'Formulate recu';
});
