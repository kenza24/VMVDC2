@extends('layout')
@section('contenu')

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
                <input type="file" name='images[]' multiple/>
                <br>
                <br>

                <?php if(!empty($tableauImages)): ?>
                    <h6>Supprimer les images souhaitées :</h6>
                <?php endif; ?>

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

            <!-- Logos Partenaires et Financeurs-->
                <h6>Ajouter un logo de partenaire ou financeur (gif, jpeg/jpg, png):</h6>
                <input type="file" name='logos[]' multiple/>
                <br>
                <br>

                <?php if(!empty($tableauLogos)): ?>
                    <h6>Supprimer ou ajouter un liens aux logos souhaités :</h6>
                <?php endif; ?>

                <div class="row">
                    <?php foreach($tableauLogos as $chemin => $url): ?>
                        <div class="input-group mb-3 col">
                            <label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" name="suppressionLogos[]" value=<?= $chemin ?>>
                                    </div>
                                </div>
                                <img src=<?= $chemin ?> alt=<?= substr(strstr($chemin, "/"), 1) ?> class="img-thumbnail" style="height: 100px; min-width: 50px;">
                                <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="<?= $url ?>" name="urls[]">
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
