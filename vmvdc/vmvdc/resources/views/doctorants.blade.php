@extends ('layout')

@section('contenu')

<!-- En-tete -->
<div class="container-fluid">
  <div class="row" style="background-color: #11385b">
    <a href="/" style="width: 15%; min-width: 100px">
      <img src="content/ibps-logo.jpg" class="img-fluid float-left" alt="Logo-IBPS">
    </a>
    <div class="col-md text-center text-wrap text-break" style="color: white; height:5%; margin-top: 1%;">
      <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
    </div>
    <a href={{route('deconnexiond')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap" role="button" aria-pressed="true">Se déconnecter</a>
  </div>
</div>

<br>
<br>
<div class="col-md text-center text-wrap text-break content_center" style="color: white;font-style: oblique; font-family: Georgia, serif;">
  <h1><?= $data[0]->nom ?></h1>
</div>

<!-- Vos informations -->
<div  class="container">
  <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;">
    <br>
    <div class="text-center text-break" style="font-style: oblique; font-family: Georgia, serif;">
      <h3> Vos informations </h3>
    </div>
    <br>
    <br>
    <div class="shadow-lg p-3 mb-5 bg-black rounded d-flex flex-wrap text-break justify-content-center" style="margin-left:2%; margin-right: 2%">

        <div class="col-md-4 mb-1 mt-1">
          <dt>Votre email : <?= $data[0]->email ?></dt>
        </div>
        <div class="col-md-4 mb-1 mt-1">
          <dt>Votre nom : <?= $data[0]->nom ?></dt>
        </div>
        <div class="col-md-4 mb-1 mt-1">
          <dt>Votre prénom : <?= $data[0]->prenom ?></dt>
        </div>

    </div>

    <div class="d-flex flex-row p-2 justify-content-center">
      <button type="button" class="btn btn-xs btn-secondary col-4 text-break">Modifier mes informations</button>
    </div>
  </div>
</div><!--Fin container-->

<!-- Sessions -->
<div class="container">
  <div class="shadow-lg p-3 bg-black rounded" style="background-color:#B0C4DE;">
    <div class="col-md-12" style=" display: inline-block;">
      <div class="d-flex flex-row">

        <div class="col-md-3">
          <div class="card" style="border: none; border-radius: 0; background-color: #f5f5f5; margin:0;">
            <!--<img class="card-img-top" src="content/enseignants.png" alt="">-->
            <div class="card flex-m shadow-sm h-md-250">
              <div class="card-body d-flex flex-column align-items-start" style="width:250px; height:100px;">
                <strong class="d-inline-block mb-2 text-secondary">Liste des sessions</strong>
                <a class="btn btn-outline-secondary btn-sm" role="button" href={{('sessionsD')}}>Y aller !</a>
              </div>
            </div>
          </div>
        </div>

      <!--Carte Classes-->
        <div class="col-md-3">
          <div class="card" style="border: none; border-radius: 0; background-color: #f5f5f5; margin:0;">
            <!--<img class="card-img-top" src="content/enseignants.png" alt="">-->
            <div class="card flex-m shadow-sm h-md-250">
              <div class="card-body d-flex flex-column align-items-start" style="width:250px; height:100px;">
                <strong class="d-inline-block mb-2 text-secondary">Mes sessions</strong>
                <a class="btn btn-outline-secondary btn-sm" role="button" href="sessionsInscrisD">Y aller !</a>
              </div>
            </div>
          </div>
        </div>

      </div>
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


    <style>
      .container{
        font-style: oblique;
        font-family: Georgia, serif;

      }
    </style>
@endsection
