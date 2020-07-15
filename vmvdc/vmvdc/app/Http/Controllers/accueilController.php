<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class accueilController extends Controller
{
    public function accueil()
    {
        $informations = DB::table('informations')->get()[0];
        $descriptifProjet = $informations->descriptifProjet;
        $demarcheParticipation = $informations->demarcheParticipation;
        $tableauImages = explode(',', $informations->images);
        $tableauImages = array_filter($tableauImages);

        return view('welcome', [
            'descriptifProjet' => $descriptifProjet,
            'demarcheParticipation' => $demarcheParticipation,
            'tableauImages' => $tableauImages
        ]);
    }

    public function modificationAccueil()
    {
        $informations = DB::table('informations')->get()[0];
        $demarcheParticipation = $informations->demarcheParticipation;
        $descriptifProjet = $informations->descriptifProjet;
        $images = $informations->images;
        $tableauImages = explode(',', $images);
        $tableauNoms = [];
        $tableauImages = array_filter($tableauImages);

        return view('modificationAccueil', [
            'descriptifProjet' => $descriptifProjet,
            'demarcheParticipation' => $demarcheParticipation,
            'tableauNoms' => $tableauNoms,
            'tableauImages' => $tableauImages
        ]);
    }

    public function updateAccueil()
    {
        $descriptifProjet = request('descriptifProjet');
        $demarcheParticipation = request('demarcheParticipation');
        $suppressionImages = request('suppressionImages');

        $resultat = DB::table('informations')->update(array('descriptifProjet' => $descriptifProjet));
        $resultat = DB::table('informations')->update(array('demarcheParticipation' => $demarcheParticipation));

        $images = DB::table('informations')->select('images')->get()[0]->images; //recuperation de la chaine des lien des images

        //Suppression Image
        if (isset($suppressionImages)) {
            foreach ($suppressionImages as $suppImage){
                unlink($suppImage);
                $images = preg_replace("#".$suppImage."#", "", $images);
                $images = trim($images, ",");
            }
            $resultat = DB::table('informations')->update(array('images' => $images));
        }

        if ($_FILES['image']['size'] != 0) { //Si un fichier est sélectionné
            $dossier = 'content/';
            $fichier = basename($_FILES['image']['name']);
            $taille_maxi = 100000000;
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
                    $chemins = explode("," ,$images);
                    array_push($chemins, $dossier.$fichier);
                    //si la chaine est vide on supprime la ',' qui va apparaitre au debut de la chaine apres l'implode
                    $resultat = DB::table('informations')->update(array('images' => trim(implode(",", $chemins), ",")));

                }
                else //Sinon (la fonction renvoie FALSE).
                {
                    echo 'Echec de l\'upload !';
                    return redirect('modificationAccueil');
                }
            }
            else
            {
                echo $erreur;
                return redirect('modificationAccueil');
            }
        }

        return redirect('/');
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

        return redirect('aPropos');
    }
}
