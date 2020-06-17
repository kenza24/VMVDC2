@extends ('layout')

@section('contenu')

<div class="contenu" style="background: url(content/bandeau-ibps.jpg) fixed no-repeat top; background-size: 100%;">

<div style="height: 10%;">
  <!-- En-tete -->
    <div class="container-fluid">
      <div class="row" style="background-color: #11385b">
          <img src="content/ibps-logo.jpg" alt="Logo-IBPS" class="float-left" style="height: 10%;">
        <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:5%; margin-top: 1%;">
          <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
        </div>
        <div class="col-md-1 d-flex align-content-center flex-wrap">
          <button type="button" class="btn btn-primary">Se connecter</button>
        </div>
        <div class="col-md-1 d-flex align-content-center flex-wrap">
          <button type="button" class="btn btn-primary">Se créer un compte</button>
        </div>
      </div>
    </div>

  <!--Bandeau-->
    <div class="text-center">
      <!--<img src="content/bandeau-ibps.jpg" class="img-fluid" alt="Responsive image" style="width: 100%;">-->
      <div style="height: 50%;"></div>
    </div>
  </div>





    <!-- En-tete -->
    <div class="container-fluid">
    <div class="row" style="background-color: #11385b;">
      <a href="">
        <img src="content/ibps-logo.jpg" alt="Logo-IBPS" class="float-left" style="height: 100px;">
      </a>
      <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:50px; margin-top: 25px;">
        <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
      </div>
      <div class="col-md-1 d-flex align-content-center flex-wrap">
        <button type="button" class="btn btn-primary">Se connecter</button>
      </div>
      <div class="col-md-1 d-flex align-content-center flex-wrap">
        <button type="button" class="btn btn-primary">Se créer un compte</button>
      </div>
    </div>
  </div>

<!--Bandeau-->
  <div class="text-center">
    <!--<img src="content/bandeau-ibps.jpg" class="img-fluid" alt="Responsive image" style="width: 100%;">-->
    <div style="height: 300px;"></div>
  </div>






  <div style="background-color: white; padding-top: 20px; border: 10px solid #11385b;">

    <!--Cartes explicatives-->
      <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex justify-content-around">

        <!--Carte 1-->
          <div class="card col-lg-5">
            <div class="card-body">
              <h5 class="card-title">Descriptif du projet</h5>
              <p class="card-text">
                Texte explicatif
              </p>
            </div>
          </div>

        <!--Carte 2-->
          <div class="card col-lg-5">
            <div class="card-body">
              <h5 class="card-title">Démarche pour y participer</h5>
              <p class="card-text">
                Texte explicatif
              </p>
            </div>
          </div>

        </div>
      </div>


    <!--Financement et partenariat-->
      <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex justify-content-around mt-5 mb-5">
          <div class="col-md-4 d-flex justify-content-around mt-5 mb-5" style="color: black;">
            <h3>Financeurs et partenaires</h3>
          </div>
        </div>
        <div class="row justify-content-md-around mt-5 mb-5">
            <a href="https://www.paris.fr/" style="background-color: white;" class="mt-2 mb-2">
              <img src="content/ville-de-paris.png" alt="Sponsor1" class="img-thumbnail" style="height: 100px; min-width: 100px;">
            </a>
            <a href="http://www.sorbonne-universite.fr/" class="mt-2 mb-2">
              <img src="content/su-logo.jpg" alt="Sponsor2" class="img-thumbnail" style="height: 100px; min-width: 100px;">
            </a>
            <a href="https://www.iledefrance.fr/" class="mt-2 mb-2">
              <img src="content/LOGO_RIDF_2019.svg" alt="Sponsor3" class="img-thumbnail" style="height: 100px; min-width: 100px;">
            </a>
            <a href="http://sciences.sorbonne-universite.fr/ufr-sciences-de-la-vie" class="mt-2 mb-2">
              <img src="content/UFR-science-de-la-vie.jpg" alt="Sponsor4" class="img-thumbnail" style="height: 100px; min-width: 100px;">
            </a>
            <!--<a href="" class="mt-2 mb-2">-->
              <img src="content/ac_creteil_paris_versailles.png" alt="Sponsor5" class="img-thumbnail mt-2 mb-2" style="height: 100px; min-width: 100px;">
            <!--</a>-->
            <a href="http://ifd.sorbonne-universite.fr/fr/a-propos-de-l-ifd.html" class="mt-2 mb-2">
              <img src="content/ifd.png" alt="Sponsor6" class="img-thumbnail" style="height: 100px; min-width: 100px;">
            </a>
            <!--<a href="" class="mt-2 mb-2">
              <img src="content/iut-villetaneuse.png" alt="Sponsor7" class="img-thumbnail" style="height: 100px; min-width: 100px;">
            </a>-->
        </div>
      </div>

    <!--Pied de page-->
      <div class="container-fluid mt-5" style="background-color: #11385b;">
        <br>
          <br>
            <div class="row d-flex justify-content-around">
              <a href="">Nous contacter</a>
              <a href="">A propos</a>
              <a href="">Qui sommes-nous ?</a>
            </div>
          <br>
        <br>
      </div>
    </div>
  </div>





@endsection
