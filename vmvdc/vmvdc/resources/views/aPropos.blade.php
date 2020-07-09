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
          <!--<a href={{route('orientationConnexion')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap" role="button" aria-pressed="true">Se connecter</a>
          <a href={{route('inscriptione')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap" role="button" aria-pressed="true">Se créer un compte</a>-->
          <div class="col-md-1"></div>
          <div class="col-md-1"></div>
        </div>
      </div>

     <div style="background-color: white; padding-top: 20px; border: 10px solid #11385b;">

    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex">
                <h3>Descriptif :</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md d-flex text-justify">
                <?= nl2br($descriptif) ?>
                <br>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex text-justify">
                <?= nl2br($equipeAdmin) ?>
                <br>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex">
                <h3>Mentions Légales :</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md d-flex text-justify">
                <?= nl2br($mentionsLegales) ?>
                <br>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex text-justify">
                <?= nl2br($equipeInfo) ?>
                <br>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex">
                <h3>Droit d'auteur et propriété intellectuelle :</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md d-flex text-justify">
                <?= nl2br($droits) ?>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex">
                <h3>Concept et design :</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md d-flex text-justify">
                <?= nl2br($conceptDesign) ?>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex">
                <h3>Loi Informatique et Liberté :</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md d-flex text-justify">
                <?= nl2br($loiInformatiqueEtLiberte) ?>
            </div>
        </div>
    </div>

    <!--Pied de page-->
      <div class="container-fluid mt-5" style="background-color: #11385b;">
        <br>
          <br>
            <div class="row d-flex justify-content-around">
              <a href="">A propos</a>
              <a href="">Qui sommes-nous ?</a>
            </div>
          <br>
        <br>
      </div>
    </div>
  </div>

@endsection
