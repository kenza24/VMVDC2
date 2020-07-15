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

        $nbElmt = count($_FILES['images']['name']);
        if ($_FILES['images']['size'][0] != 0) {
            $dossier = 'content/';
            $taille_maxi = 100000000;
            $extensions = array('.png', '.gif', '.jpg', '.jpeg');
            for ($i=0; $i < $nbElmt; $i++) { 
                $nomFichier = basename($_FILES['images']['name'][$i]);
                $tailleFichier = filesize($_FILES['images']['tmp_name'][$i]);
                $extension = strrchr($_FILES['images']['name'][$i], '.');
                //Début des vérifications de sécurité...
                if(in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                {
                    if($tailleFichier <= $taille_maxi)
                    {
                        //On formate le nom du fichier ici...
                        $nomFichier = strtr($nomFichier, 
                            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                        $nomFichier = preg_replace('/([^.a-z0-9]+)/i', '-', $nomFichier);
                        if(move_uploaded_file($_FILES['images']['tmp_name'][$i], $dossier . $nomFichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                        {
                            $images = DB::table('informations')->select('images')->get()[0]->images; //recuperation de la chaine des lien des images
                            $chemins = explode("," ,$images);
                            array_push($chemins, $dossier.$nomFichier);
                            //si la chaine est vide on supprime la ',' qui va apparaitre au debut de la chaine apres l'implode
                            $resultat = DB::table('informations')->update(array('images' => trim(implode(",", $chemins), ",")));
                        }
                        else //Sinon (la fonction renvoie FALSE).
                        {
                            //dd('Fin1');
                            return redirect('modificationAccueil');
                        }
                    }
                    else {
                        //dd('Fin2');
                        return redirect('modificationAccueil');
                    }
                }
                else {
                    //dd('Fin3');
                    return redirect('modificationAccueil');
                }
            }
        }

        //dd('Fin4');
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
