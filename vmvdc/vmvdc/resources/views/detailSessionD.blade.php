@extends('layout')
@section('contenu')

<!-- contenu -->
  <div class="container pt-3 pb-3">
    <br>
    <div class="shadow-lg bg-blue rounded pt-3 pb-3" style="background-color: #B0C4DE; ">
      <div class="col-md text-center text-wrap text-break pl-5 pr-5" style="font-style: oblique; font-family: Georgia, serif;">
        <br>
        <h2> <strong>Session du <?=$session->date ?></strong></h2>
        <br>
          <table class="table table-striped table-responsive-xl" style="font-size:20px;">
            <thead>
              <tr>
                <th scope="col">Enseignant</th>
                <th scope="col">E-mail</th>
                <th scope="col">Nombres d'élèves</th>
                <th scope="col">Niveau de la classe</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?= $enseignant->prenom." ".$enseignant->nom ?></td>
                <td><?= $enseignant->email ?></td>
                <td> <?= $session->effectifClasse ?></td>
                <td> <?= ucfirst($session->niveau) ?></td>
                </tr>

            </tbody>
          </table>
        <div class="container pt-3 pb-3" style="background-color:#B0C4DE;font-style: oblique; font-family: Georgia, serif; text-align:center;">
        <!-- Inforamtions principales -->
          <!--<div class="col-md-4 pt-3 pb-3">
            <h5><strong>Enseignant :</strong> <?= $enseignant->prenom." ".$enseignant->nom ?></h5>
          </div>
          <div class="col-md-4 pt-3 pb-3">
            <h5><strong>Adresse mail : </strong><?= $enseignant->email ?></h5>
          </div>
          <div class="col-md-4 pt-3 pb-3">
            <h5><strong>Nombre d'élèves : </strong><?= $session->effectifClasse ?></h5>
          </div>
          <div class="col-md-4 pt-3 pb-3">
            <h5><strong>Niveau de la classe : </strong><?= ucfirst($session->niveau) ?></h5>
          </div>-->
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
              <h5><strong>Choisissez un document de présentation :</strong></h5>
            </div>
            <input type="file" name="fichiers[]" style="font-size:20px" multiple>
            <div class="pt-3 pb-3">
              <label style="font-size:20px"><strong>Informations complémentaires : </strong></label>
            </div>
            <input type="text" hidden name="idSession" value=<?= $session->id ?>>
            <textarea name="details" class="md-textarea form-control" rows="5" style="width:500px; margin:auto;"><?= $session->details ?></textarea>
            <button type="submit" class="btn btn-secondary btn-block mt-3 mb-3" style="width:100px; margin:auto;">Valider</button>
          </form>
        </div>
      </div>
    </div>
    <br>
  </div>

@endsection
