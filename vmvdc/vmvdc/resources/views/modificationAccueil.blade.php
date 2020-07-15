@extends('layout')
@section('contenu')



<div class="contenu" style="background: url(content/bandeau-ibps.jpg) fixed no-repeat top; background-size: 100%;">
    <!-- En-tete -->
    <div class="container-fluid">
        <div class="row" style="background-color: #11385b;">
            <a href="">
                <img src="content/ibps-logo.jpg" alt="Logo-IBPS" class="float-left" style="height: 100px;">
            </a>
            <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:50px; margin-top: 25px; margin-left: 100px;">
                <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
            </div>
        </div>
    </div>
</div>
<div class="container" action="/preInscriptionE">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="width: 800px;">
            <h4 class="card-title mt-3 text-center">Modification de la page d'accueil</h4>
            <br>
            <form action={{'updateAccueil'}} method="post" enctype="multipart/form-data">
            {{csrf_field()}}

                <!-- Descriptif du projet -->
                <h6>Descriptif du projet :</h6>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" name="descriptifProjet" style="height : 20em;"><?=
                        $descriptifProjet
                    ?></textarea>
                </div>
                <br>

                <!-- Demarche de participation -->
                <h6>Démarche de participation :</h6>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" name="demarcheParticipation" style="height : 20em;"><?=
                        $demarcheParticipation
                    ?></textarea>
                </div>
                <br>

                <!-- Images -->
                <h6>Ajouter une image (gif, jpeg/jpg, png):</h6>
                <input type="file" name="image"/>
                <br>
                <br>

                <div class="row">
                    <?php foreach($tableauImages as $image): ?>
                        <div class="input-group mb-3 col">
                            <label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" name="suppressionImages[]" value=<?= $image ?>>
                                    </div>
                                </div>
                                <img src=<?= $image ?> alt=<?= substr(strstr($image, "/"), 1) ?> class="img-thumbnail" style="height: 100px; min-width: 50px;">
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                

                <!--BOUTON-->
                <button type="submit" class="btn btn-secondary btn-block">Valider</button>

            </form>
        </article>
    </div>
</div>

@endsection
