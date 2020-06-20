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

//page d'accueil
Route::get('/', function () {
    return view('welcome');
});


Route::view('/orientationConnexion','orientationConnexion')->name('orientationConnexion');

//ENSEIGNANTS
Route::get('/connexionE', function(){
  return view ('connexionE');
});
Route::post("connexionE", "ConnexionControllerE@traitement")->name('connexionE');

Route::get('/inscriptione', function(){
  return view('inscriptionE');
});
Route::post('inscriptione', "inscriptionEController@inscription")->name('inscriptione');
//J'ai essayé avec inscriptionE mais ca a pas l'air de marcher avec des majuscules

Route::get('/enseignants', "CompteEController@accueil")->name('enseignants');
Route::get('/deconnexione', "CompteEController@deconnexion")->name('deconnexione');


//DOCTORANTS
Route::get('/inscriptionsD', function(){
  return view('inscriptionsD');
});

Route::get('/connexionD', function(){
  return view ('connexionD');
});
Route::post("connexionD", "ConnexionControllerD@traitement")->name('connexionD');

Route::get('/doctorants', "CompteDController@accueil")->name('doctorants');
Route::get('/deconnexiond', "CompteDController@deconnexion")->name('deconnexiond');

Route::get('/admin', function(){
  return view('admin');
});

//Auth

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

;
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
