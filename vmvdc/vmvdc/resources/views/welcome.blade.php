@extends ('layout')

@section('contenu')

<div class="contenu" style="background: url(content/bandeau-ibps.jpg) fixed no-repeat top; background-size: 100%;">
    <!-- En-tete -->
  <div class="container-fluid">
    <div class="row" style="background-color: #11385b;">
      <a href="">
        <img src="content/ibps-logo.jpg" alt="Logo-IBPS" class="float-left" style="height: 100px;">
      </a>
      <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:50px; margin-top: 25px;">
        <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
      </div>
      <div class="col-2"></div>

      <!--<a href="" class="col-md-2 text-reset border border-top-0 border-bottom-0 text-center text-wrap text-break" style="background-color: white;">
        <h5>Se créer un compte enseignant</h5>
      </a>
      <a href="" class="col-md-1 text-reset border border-top-0 border-bottom-0 text-center text-wrap text-break" style="background-color: white;">
        <h5>Se connecter</h5>
      </a>-->
    </div>
  </div>

  <!--Bandeau-->
  <div class="text-center mb-5">
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

    
    <!--Financement-->
      <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex justify-content-around mt-5 mb-5">
          <div class="col-md-2 d-flex justify-content-around mt-5 mb-5" style="color: black;">
            <h3>Financeurs</h3>
          </div>
        </div>
        <div class="row d-flex justify-content-around mt-5 mb-5">
          <div class="col-md-2">
            <a href="https://www.paris.fr/" style="background-color: white;">
              <img src="content/ville-de-paris.png" alt="Sponsor1" class="img-thumbnail" style="width: 100%">
            </a>
          </div>
          <div class="col-md-2">
            <a href="http://www.sorbonne-universite.fr/">
              <img src="content/su-logo.jpg" alt="Sponsor2" class="img-thumbnail" style="width: 100%;">
            </a>
          </div>
          <div class="col-md-2">
            <a href="https://www.iledefrance.fr/">
              <img src="content/idf-logo.jpg" alt="Sponsor3" class="img-thumbnail" style="width: 100%;">
            </a>
          </div>
          <div class="col-md-2">
            <a href="http://sciences.sorbonne-universite.fr/ufr-sciences-de-la-vie">
              <img src="content/UFR-science-de-la-vie.jpg" alt="Sponsor4" class="img-thumbnail" style="width: 100%;">
            </a>
          </div>

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
