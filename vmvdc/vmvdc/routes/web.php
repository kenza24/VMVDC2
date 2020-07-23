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
Route::get('/', "accueilController@accueil");
Route::get('accueil', "accueilController@accueil");
Route::get('aPropos', "accueilController@aPropos");

Route::view('/orientationConnexion','orientationConnexion')->name('orientationConnexion');

Route::get('retourProfil', 'accueilController@retourProfil')->name('retourProfil');


//ENSEIGNANTS
Route::get('/connexionE', function(){
  return view ('connexionE');
});
Route::post("connexionE", "ConnexionControllerE@traitement")->name('connexionE');

Route::get('/inscriptione', "inscriptionEController@pageInscriptionE");
Route::post('inscriptione', "inscriptionEController@inscription")->name('inscriptione');

Route::get('/enseignants', "CompteEController@accueil")->name('enseignants');
Route::get('/deconnexione', "CompteEController@deconnexion")->name('deconnexione');


//DOCTORANTS
Route::get('inscriptionsD', "InscriptionsDController@pageInscriptionsD");
Route::post('inscriptionsD', "InscriptionsDController@inscription")->name('inscriptionsD');


Route::get('/connexionD', function(){
  return view ('connexionD');
});

Route::post("connexionD", "ConnexionControllerD@traitement")->name('connexionD');

Route::get('/doctorants', "CompteDController@accueil")->name('doctorants');
Route::get('/deconnexiond', "CompteDController@deconnexion")->name('deconnexiond');

Route::get('/connexionD', function(){
  return view ('connexionD');
});

//ESPACE ADMINISTRATEURS
Route::get('/administrateurs', function(){
  return view('administrateurs');
});

Route::get('/connexionA', function(){
  return view('connexionA');
});

Route::get('/ajoutSession',"CompteAController@pageAjoutSession");

Route::get('listeSessionsA', "ListeSessionsAController@sessionsA")->name('listeSessionsA');

Route::get('inscriptionsA',"InscriptionsAController@pageInscriptionsA");
Route::post('inscriptionsA', "InscriptionsAController@inscription")->name('inscriptions');

Route::post('ajoutSession', "CompteAController@ajoutSession")->name('ajoutSession');

Route::get('sessionsA', 'listesAController@sessions')->name('sessionsA');
Route::get('classesA', 'listesAController@classes')->name('classesA');

Route::post('detailSessionA', 'CompteAController@details')->name('detailSessionA');
Route::post('telechargementA', 'CompteAController@telechargement')->name('telechargementA');

Route::get('listeEnseignantsA', 'listesAController@enseignants')->name('listeEnseignantsA');
Route::get('listeDoctorantsA', 'listesAController@doctorants')->name('listeDoctorantsA');

Route::post('selectionClasse', 'listesAController@selectionClasse')->name('selectionClasse');
Route::post('deselectionClasse', 'listesAController@deselectionClasse')->name('deselectionClasse');
Route::get('preInscriptionsA', 'listesAController@preInscriptions')->name('preInscriptionsA');
Route::get('validationSessions', 'listesAController@validationSessions')->name('validationSessions');
Route::get('invalidationSessions', 'listesAController@invalidationSessions')->name('invalidationSessions');
Route::post('accueilSession', 'listesAController@accueilSession')->name('accueilSession');
Route::post('desistementSession', 'listesAController@desistementSession')->name('desistementSession');

Route::post("connexionA", "ConnexionControllerA@traitement")->name('connexionA');

Route::get('/administrateurs', "CompteAController@accueil")->name('administrateurs');
Route::get('modificationAccueil', "accueilController@modificationAccueil")->name('modificationAccueil');
Route::post('updateAccueil', "accueilController@updateAccueil")->name('updateAccueil');
Route::get('modificationAPropos', "accueilController@modificationAPropos")->name('modificationAPropos');
Route::post('updateAPropos', "accueilController@updateAPropos")->name('updateAPropos');

//FIN ADMINISTRATEURS

//ESPACE ENSEIGNANTS
Route::get('sessionsE', "CompteEController@sessions")->name('sessionsE');
Route::post('acceptation', "CompteEController@acceptation")->name('acceptation');
Route::post('refus', "CompteEController@refus")->name('refus');

Route::post('detailSessionE', 'CompteEController@details')->name('detailSessionE');
Route::post('telechargementE', 'CompteEController@telechargement')->name('telechargementE');

//PRE INSCRIPTION D'UNE CLASSE
Route::post('preInscriptionE', "PreInscriptionController@preInscription")->name('preInscriptionE');
Route::get('preInscriptionE', 'PreInscriptionController@session')->name('preInscriptionE'); //affichages des dates depuis bdd


Route::get('bienInscris', function(){
  return view ('bienInscris');
});

Route::get('listePreInscritE', 'ListePreInscritEController@affichage')->name('listePreInscritE');

//FIN ENSEIGNANTS

//ESPACE DOCTORANT
Route::post('desinscriptionD', 'SessionsDController@desinscriptionDoctorant')->name('desinscriptionD');
Route::post('inscriptionD', 'SessionsDController@inscriptionDoctorant')->name('inscriptionD');
Route::get('sessionsD', 'SessionsDController@sessions')->name('sessionsD');
Route::get('enseignantsD', 'SessionsDController@enseignants')->name('enseignants');

Route::get('sessionsInscrisD', 'ListeInscritDController@sessionsI')->name('sessionsInscrisD');

Route::post('detailSessionD', 'DetailSessionDController@details')->name('detailSessionD');
Route::post('telechargementD', 'DetailSessionDController@telechargement')->name('telechargementD');

//MODIFICATIONS DES INFOS PERSO
Route::get('modificationInfosD', 'ModificationInfosDController@pageModification');
Route::post('modifD', 'ModificationInfosDController@modif')->name('modifD');

Route::get('modificationInfosE', 'ModificationInfosEController@pageModification');
Route::post('modifE', 'ModificationInfosEController@modif')->name('modifE');

Route::get('modificationInfosA', 'ModificationInfosAController@pageModification');
Route::post('modifA', 'ModificationInfosAController@modif')->name('modifA');


//SUPPRESSION DES COMPTES

Route::post('suppressionE', 'SuppressionCompteController@suppressionE')->name('suppressionE');
Route::post('suppressionEAdmin', 'SuppressionCompteController@suppressionEAdmin')->name('suppressionEAdmin');

Route::post('suppressionD', 'SuppressionCompteController@suppressionD')->name('suppressionD');
Route::post('suppressionDAdmin', 'SuppressionCompteController@suppressionDAdmin')->name('suppressionDAdmin');

Route::post('suppressionA', 'SuppressionCompteController@suppressionA')->name('suppressionA');




//FIN DOCTORANT
//Auth
/*
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
});*/
