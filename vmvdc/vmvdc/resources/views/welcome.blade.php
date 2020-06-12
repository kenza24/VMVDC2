@extends ('layout')

@section('contenu')

<div class="container-fluid">

  <!-- Columns are always 50% wide, on mobile and desktop -->
  <div class="row" style="background-color: #11385b;">
    <a href="" class="col-auto" style="background-color: white;">
      <img src="content/Logo-IBPS.png" alt="Bootstrap" class="Logo-IBPS" style="max-height: 100px;">
    </a>
    <div class="col-md text-center text-wrap text-break content_center" style="color: white;">
      <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
    </div>
    <a href="" class="col-md-2 text-reset border border-top-0 border-bottom-0 text-center text-wrap text-break" style="background-color: white;">
      <h5>Se créer un compte enseignant</h5>
    </a>
    <a href="" class="col-md-1 text-reset border border-top-0 border-bottom-0 text-center text-wrap text-break" style="background-color: white;">
      <h5>Se connecter</h5>
    </a>

  <br>
  </div>
</div>

<div class="text-center mb-5">
  <img src="content/bandeau.png" class="img-fluid" alt="Responsive image" style="height: 300px;">
</div>

<div class="container-fluid mt-5 mb-5">
  <div class="row d-flex justify-content-around">
    <div class="card col-lg-5">
      <div class="card-body">
        <h5 class="card-title">Descriptif du projet</h5>
        <p class="card-text">
          Texte explicatif
        </p>
      </div>
    </div>

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

<div class="container-fluid mt-5 mb-5">
  <div class="row d-flex justify-content-around mt-5 mb-5">
    <div class="col-md-2 d-flex justify-content-around mt-5 mb-5" style="color: white;">
      <h3>Financeurs</h3>
    </div>
  </div>
  <div class="row d-flex justify-content-around mt-5 mb-5">
    <a href="https://www.paris.fr/">
      <img src="content/ville-de-paris.jpeg" alt="Sponsor1" class="img-thumbnail">
    </a>
    <a href="http://www.sorbonne-universite.fr/">
      <img src="content/sorbonne-universite.png" alt="Sponsor2" class="img-thumbnail">
    </a>
  </div>
</div>

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

@endsection
