@extends('layout')
@section('contenu')

<!-- Entete -->
  <div class="contenu">
    <div class="container-fluid">
      <div class="row" style="background-color: #11385b">
        <a href="" style="width: 16%; min-width: 100px">
          <img src="content/ibps-logo.jpg" class="img-fluid float-left" alt="Logo-IBPS">
        </a>
        <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:5%; margin-top: 1%;">
          <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
        </div>
        <!--<a href={{route('orientationConnexion')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap" role="button" aria-pressed="true">Se connecter</a>
        <a href={{route('inscriptione')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap" role="button" aria-pressed="true">Se créer un compte</a>-->
        <div class="col-md-1"></div>
        <form action={{route('deconnexione')}}>
          <button type="submit" class="btn btn-primary btn-block col-md">Se déconnecter</button>
        </form>
      </div>
    </div>
  </div>

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
            <h5>Doctorant :</h5>
              <ul>
                  <?php foreach ($doctorants as $doctorant): ?>
                      <li style="font-size:15px"><?= $doctorant->prenom." ".$doctorant->nom." : ".$doctorant->email ?></li>
                  <?php endforeach; ?>
              <ul>
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
