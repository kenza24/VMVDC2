@extends('layout')
@section('contenu')

<!-- contenu -->
  <div class="container pt-3 pb-3">
    <div class="shadow-lg bg-blue rounded pt-3 pb-3" style="background-color: #B0C4DE;">
      <div class="col-md text-center text-wrap text-break pl-5 pr-5">
        <h2> Session du <?=$session->date ?><h2>
        <div class="container pt-3 pb-3" style="background-color:white;">
        <!-- Inforamtions principales -->
          <div class="col-md-4 pt-3 pb-3">
            <h5>Enseignant : <?= $enseignant->prenom." ".$enseignant->nom ?></h5>
          </div>
          <div class="col-md-4 pt-3 pb-3">
            <h5>Adresse mail : <?= $enseignant->email ?></h5>
          </div>
          <div class="col-md-4 pt-3 pb-3">
            <h5>Nombre d'élèves : <?= $session->effectifClasse ?></h5>
          </div>
          <div class="col-md-4 pt-3 pb-3">
            <h5>Niveau de la Classe : <?= ucfirst($session->niveau) ?></h5>
          </div>
        <!-- fichiers et details -->
          <?php if(isset($fichiers[0])):?>
            <h5>Documents liés à la sessions :</h5>
            <div class="list-group">
              <?php foreach($fichiers as $fichier): ?>
                <form action={{'telechargementD'}} method="post">
                  {{csrf_field()}}
                  <input type="text" hidden name="chemin" value=<?= $fichier->fichiers ?>>
                  <button type="submit" class="btn btn-light"><?= $fichier->nomFichier ?></button>
                </form>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <form action={{'detailSessionD'}} enctype="multipart/form-data" method="POST">
            {{csrf_field()}}
            <div class="pt-3 pb-3">
              <h5>Choisissez un document de présentation :</h5>
            </div>
            <input type="file" name="fichiers[]" style="font-size:20px" multiple>
            <div class="pt-3 pb-3">
              <label style="font-size:20px">Informations complémentaires : </label>
            </div>
            <input type="text" hidden name="idSession" value=<?= $session->id ?>>
            <textarea name="details" class="md-textarea form-control" rows="5" style="width:500px; margin:auto;"><?= $session->details ?></textarea>
            <button type="submit" class="btn btn-secondary btn-block mt-3 mb-3" style="width:100px; margin:auto;">Valider</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<!--Pied de page-->
  <div class="container-fluid" style="background-color: #11385b;">
    <br>
      <br>
        <div class="row d-flex justify-content-around">
          <a href={{'aPropos'}}>A propos</a>
          <a href="https://sites.google.com/view/vismaviedechercheuribps/%C3%A9quipe-p%C3%A9dagogique?authuser=0">Qui sommes-nous ?</a>
        </div>
      <br>
    <br>
  </div>

@endsection
