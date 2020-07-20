@extends ('layout')

@section('contenu')

<div class="contenu" style="background: url(content/bandeau-ibps.jpg) fixed no-repeat top; background-size: auto 500px;">

  <div>
    <!-- En-tete -->
      <div class="container-fluid">
        <div class="row" style="background-color: #11385b">
          <a href="" style="width: 15%; min-width: 100px">
            <img src="content/ibps-logo.jpg" class="img-fluid float-left" alt="Logo-IBPS">
          </a>
          <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:5%; margin-top: 1%;">
            <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
          </div>
          <!--<div class="col-md-1 d-flex align-content-center flex-wrap">
            <button type="button" class="btn btn-primary">Se connecter</button>
          </div>-->
          <!--<div class="col-md-1 d-flex align-content-center flex-wrap">
            <button type="button" class="btn btn-primary">Se créer un compte</button>
          </div>-->
          <a href={{route('orientationConnexion')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap" role="button" aria-pressed="true">Se connecter</a>
          <a href={{route('inscriptione')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap" role="button" aria-pressed="true">Se créer un compte</a>
        </div>
      </div>

    <!--Bandeau-->
      <div class="text-center bandeau" style="height: 300px;">
        <!--<img src="content/bandeau-ibps.jpg" class="img-fluid" alt="Responsive image" style="width: 100%;">-->
      </div>
    </div>

  <div style="background-color: #D2E6FF; padding-top: 20px; border: 10px solid #11385b;">

    <!--Cartes explicatives-->
  <!--  <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;"> -->
      <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex justify-content-around">

        <!--Carte 1-->
          <div class="card col-lg-5">
            <div class="card-body">
              <h5 class="card-title">Descriptif du projet</h5>
              <p class="card-text text-justify">
                <?= nl2br($descriptifProjet) ?>
                <br>
                <br>
                <a href="//sites.google.com/view/vismaviedechercheuribps/objectifs?authuser=0">Lien vers les objectifs</a>
              </p>
            </div>
          </div>

        <!--Carte 2-->
          <div class="card col-lg-5">
            <div class="card-body" >
              <h5 class="card-title">Démarche pour y participer</h5>
              <p class="card-text text-justify">
              <?= nl2br($demarcheParticipation) ?>
              </p>
            </div>
          </div>

        </div>
      </div>

    <!--Images-->
      <div class="container-fluid mt-5 mb-5">
        <?php if(!empty($tableauImages)): ?>
          <div class="row d-flex justify-content-around mt-5 mb-5">
            <div class="col-md d-flex justify-content-around mt-5 mb-5" style="color: black;">
              <h3>Images de présentation</h3>
            </div>
          </div>
        <?php endif; ?>
        <div class="row justify-content-md-around mt-5 mb-5" id="image">
          <?php foreach($tableauImages as $image): ?>
            <img src=<?= $image ?> alt=<?= substr(strstr($image, "/"), 1) ?> class="img-thumbnail" style="height: 300px; min-width: 100px;">
          <?php endforeach; ?>
        </div>
      </div>


    <!--Financement et partenariat-->
      <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex justify-content-around mt-5 mb-5">
          <div class="col-md d-flex justify-content-around mt-5 mb-5" style="color: black;">
            <h3>Financeurs et partenaires</h3>
          </div>
        </div>
        <div class="row justify-content-md-around mt-5 mb-5" id="financeur-partenaire-logo">
          <?php foreach ($tableauLogos as $chemin => $url):?>
            <a href=<?= $url ?> class="mt-2 mb-2">
              <img src=<?= $chemin ?> alt=<?= substr(strstr($chemin, "/"), 1) ?> class="img-thumbnail">
            </a>
          <?php endforeach; ?>
        </div>
      </div>

    <!--Pied de page-->
      <div class="container-fluid mt-5" style="background-color: #11385b;">
        <br>
          <br>
            <div class="row d-flex justify-content-around">
              <a href={{'aPropos'}}>A propos</a>
              <a href="https://sites.google.com/view/vismaviedechercheuribps/%C3%A9quipe-p%C3%A9dagogique?authuser=0">Qui sommes-nous ?</a>
            </div>
          <br>
        <br>
      </div>
    </div>
  </div>

@endsection