<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/connexionE', function(){
  return view ('connexionE');
});

Route::post("connexionE", "ConnexionControllerE@traitement")->name('connexionE');

Route::get('/creationCompteE', function(){
  return view ('creationCompteE');
});

Route::get('/creationD', function(){
  return view ('creationD');
});

Route::get('/enseignants', function(){
  return view ('enseignants');
});

Route::get('/inscriptionE', function(){
  return view('inscriptionE');
});

Route::get('/inscriptionsD', function(){
  return view('inscriptionsD');
});

Route::post('inscriptionE', function(){
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

Route::post('inscriptionsD', function(){
  $doctorant = new App\Doctorants;

  $doctorant->email = request ('emailD');
  $doctorant->mot_de_passe = bcrypt(request('mdpD'));
  $doctorant->nom = request ('nomD');
  $doctorant->prenom = request ('prenomD');


  $doctorant->save();

  return 'Nous avons recu votre mail qui est : ' . request('emailD');
//  return 'Formulate recu';
});

//CONNEXION DU DOCTORANT
//Route::get('/connexionD', 'ConnexionControllerD@formulaire' );
//Route::post('/connexionD', 'ConnexionControllerD@traitement' );
//Route::get('/compteD', 'CompteDController@accueil');

//Route :: get('/deconnexion', 'CompteDController@deconnexion');

//CONNEXION ENSEIGNANT
Route::get('/compteE', 'CompteEController@accueil');
//Route::post("compteE", "CompteEController@accueil")->name('compteE');

Auth::routes();


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/doctorants', 'Auth\LoginController@showDoctorantsLoginForm');
Route::get('/login/enseignants', 'Auth\LoginController@showEnseignantLoginForm');


Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/doctorants', 'Auth\RegisterController@showDoctorantsRegisterForm');
Route::get('/register/enseignants', 'Auth\RegisterController@showEnseignantRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/doctorants', 'Auth\LoginController@doctorantsLogin');
Route::post('/login/blogger', 'Auth\LoginController@enseignantsLogin');


Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/doctorants', 'Auth\RegisterController@createDoctorants');
Route::post('/register/doctorants', 'Auth\RegisterController@createEnseignants');
/*
Route::group([‘middleware’ => ‘auth:doctorants], function () {
Auth::routes();
Route::view(‘/doctorants’, ‘doctorants’);
});
Route::group([‘middleware’ => ‘auth:enseignants’], function () {
Auth::routes();
Route::view(‘/enseignants’, ‘enseignants’);
});
Route::group([‘middleware’ => ‘auth:admin’], function () {
Auth::routes();
Route::view(‘/admin’, ‘admin’);
});
*/
