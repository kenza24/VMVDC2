<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class accueilController extends Controller
{
    public function accueil()
    {
        $descriptifProjet = DB::table('informations')->get()[0]->descriptifProjet;
        $demarcheParticipation = DB::table('informations')->get()[0]->demarcheParticipation;

        return view('welcome', [
            'descriptifProjet' => $descriptifProjet,
            'demarcheParticipation' => $demarcheParticipation
        ]);
    }

    public function modificationAccueil()
    {
        $informations = DB::table('informations')->get()[0];
        $demarcheParticipation = $informations->demarcheParticipation;
        $descriptifProjet = $informations->descriptifProjet;

        return view('modificationAccueil', [
            'descriptifProjet' => $descriptifProjet,
            'demarcheParticipation' => $demarcheParticipation
        ]);
    }

    public function updateAccueil()
    {
        $descriptifProjet = request('descriptifProjet');
        $demarcheParticipation = request('demarcheParticipation');

        $resultat = DB::table('informations')->update(array('descriptifProjet' => $descriptifProjet));
        $resultat = DB::table('informations')->update(array('demarcheParticipation' => $demarcheParticipation));



        $dossier = 'content/';
        $fichier = basename($_FILES['image']['name']);
        $taille_maxi = 100000;
        $taille = filesize($_FILES['image']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['image']['name'], '.'); 
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
        }
        if($taille>$taille_maxi)
        {
            $erreur = 'Le fichier est trop gros...';
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier, 
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                echo 'Upload effectué avec succès !';
                $images = DB::table('informations')->select('images')->get()[0]->images;
                $chemins = explode("," ,$images);
                array_push($chemins, $dossier.$fichier);
                $resultat = DB::table('informations')->update(array('images' => implode(",", $chemins)));
            }
            else //Sinon (la fonction renvoie FALSE).
            {
                echo 'Echec de l\'upload !';
            }
        }
        else
        {
            echo $erreur;
        }

        return $this->accueil();
    }

    public function aPropos()
    {
        $aPropos = DB::table('aPropos')->get()[0];
        $equipeAdmin = $aPropos->equipeAdmin;
        $mentionsLegales = $aPropos->mentionsLegales;
        $equipeInfo = $aPropos->equipeInfo;
        $droits = $aPropos->droits;
        $conceptDesign = $aPropos->conceptDesign;
        $loiInformatiqueEtLiberte = $aPropos->loiInformatiqueEtLiberte;
        $descriptif = $aPropos->descriptif;

        return view('aPropos', [
            'equipeAdmin' => $equipeAdmin,
            'mentionsLegales' => $mentionsLegales,
            'equipeInfo' => $equipeInfo,
            'droits' => $droits,
            'conceptDesign' => $conceptDesign,
            'loiInformatiqueEtLiberte' => $loiInformatiqueEtLiberte,
            'descriptif' => $descriptif
        ]);
    }

    public function modificationAPropos()
    {
        $aPropos = DB::table('aPropos')->get()[0];
        $descriptif = $aPropos->descriptif;
        $equipeAdmin = $aPropos->equipeAdmin;
        $mentionsLegales = $aPropos->mentionsLegales;
        $equipeInfo = $aPropos->equipeInfo;
        $droits = $aPropos->droits;
        $conceptDesign = $aPropos->conceptDesign;
        $loiInformatiqueEtLiberte = $aPropos->loiInformatiqueEtLiberte;

        return view('modificationAPropos', [
            'descriptif' => $descriptif,
            'equipeAdmin' => $equipeAdmin,
            'mentionsLegales' => $mentionsLegales,
            'equipeInfo' => $equipeInfo,
            'droits' => $droits,
            'conceptDesign' => $conceptDesign,
            'loiInformatiqueEtLiberte' => $loiInformatiqueEtLiberte
        ]);
    }

    public function updateAPropos()
    {
        $descriptif = request('descriptif');
        $equipeAdmin = request('equipeAdmin');
        $mentionsLegales = request('mentionsLegales');
        $equipeInfo = request('equipeInfo');
        $droits = request('droits');
        $conceptDesign = request('conceptDesign');
        $loiInformatiqueEtLiberte = request('loiInformatiqueEtLiberte');

        $resultat = DB::table('APropos')->update(array('descriptif' => $descriptif));
        $resultat = DB::table('APropos')->update(array('equipeAdmin' => $equipeAdmin));
        $resultat = DB::table('APropos')->update(array('mentionsLegales' => $mentionsLegales));
        $resultat = DB::table('APropos')->update(array('equipeInfo' => $equipeInfo));
        $resultat = DB::table('APropos')->update(array('droits' => $droits));
        $resultat = DB::table('APropos')->update(array('conceptDesign' => $conceptDesign));
        $resultat = DB::table('APropos')->update(array('loiInformatiqueEtLiberte' => $loiInformatiqueEtLiberte));

        return $this->aPropos();
    }
}