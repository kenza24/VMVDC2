@extends ('layout')

@section('contenu')


<!-- En-tete -->
  <div class="container-fluid">
    <div class="row" style="background-color: #11385b;">
      <a href="">
        <img src="content/ibps-logo.jpg" alt="Logo-IBPS" class="float-left" style="height: 100px;">
      </a>
      <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:50px; margin-top: 25px; margin-left: 100px;">
        <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
      </div>
      <form action={{route('deconnexiond')}}>
       <button type="submit" class="btn btn-primary btn-block">Se déconnecter</button>
     </form>
    </div>
  </div>
  <br>
  <br>
  <br>

<!--Vos informations-->
  <div  class="container">
    <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;">
      <br>
      <div class="col-md text-center text-wrap text-break content_center" style="font-style: oblique; font-family: Georgia, serif;">
        <h3> Vos informations </h3>
      </div>
      <br>
      <br>

      <div class="shadow-lg p-3 mb-5 bg-black rounded" style="width: 1000px; margin-left:55px">
        <div class="row align-items-center">
          <div class="col-4">
            <dt class="col-xl-5" style="margin-left:30px;">Votre email :</dt>
          </div>
          <div class="col-4">
            <dt class="col-xl-5" style="margin-left:30px;">Votre nom :</dt>
          </div>
          <div class="col-4">
            <dt class="col-xl-5" style="margin-left:30px;">Votre prénom </dt>
          </div>
        </div>
      </div>

      <div style="text-align:center;">
          <a type="button" class="btn btn-xs btn-secondary" href="">Modifier mes informations</a>
          <a type="button" class="btn btn-xs btn-secondary" href="inscriptionsA">Inscrire un administrateur</a>
      </div>
    </div>
  </div><!--Fin container-->

<!--Cartes-->
  <div class="container">
    <div class="shadow-lg p-3 mb-5 bg-black rounded" style="background-color:#B0C4DE;">
      <div class="d-flex flex-row">
        <div class="row">

        <!--Carte doctorants-->
          <div class="col-md-3">
            <div class="card" style="border: none; border-radius: 0; background-color: #f5f5f5; margin:0;">
            <img class="card-img-top" src="content/doctorants.png" alt="" style="height:205px;">
             <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start" style="width:250px; height:100px;">
                  <strong class="d-inline-block mb-2 text-secondary">Les doctorants</strong>
                  <a class="btn btn-outline-secondary btn-sm" role="button" href={{('listeDoctorantsA')}} style="position:center">Y aller !</a>
                </div>
              </div>
            </div>
          </div>

        <!--Carte Enseignants-->
          <div class="col-md-3">
            <div class="card" style="border: none; border-radius: 0; background-color: #f5f5f5; margin:0;">
              <img class="card-img-top" src="content/enseignants.png" alt="">
              <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start" style="width:250px; height:100px;">
                  <strong class="d-inline-block mb-2 text-secondary">Les enseignants</strong>
                  <a class="btn btn-outline-secondary btn-sm" role="button" href={{('listeEnseignantsA')}}>Y aller !</a>
                </div>
              </div>
            </div>
          </div>

        <!--Carte Sessions-->
          <div class="col-md-3">
            <div class="card" style="border: none; border-radius: 0; background-color: #f5f5f5; margin:0;">
              <!--<img class="card-img-top" src="content/enseignants.png" alt="">-->
              <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start" style="width:250px; height:100px;">
                  <strong class="d-inline-block mb-2 text-secondary">Les sessions Validées</strong>
                  <a class="btn btn-outline-secondary btn-sm" role="button" href={{('sessionsA')}}>Y aller !</a>
                </div>
              </div>
            </div>
          </div>

        <!--Carte Classes-->
          <div class="col-md-3">
              <div class="card" style="border: none; border-radius: 0; background-color: #f5f5f5; margin:0;">
                <!--<img class="card-img-top" src="content/enseignants.png" alt="">-->
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                  <div class="card-body d-flex flex-column align-items-start" style="width:250px; height:100px;">
                    <strong class="d-inline-block mb-2 text-secondary">Les classes pré-inscrites</strong>
                    <a class="btn btn-outline-secondary btn-sm" role="button" href={{('classesA')}}>Y aller !</a>
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div><!--fin cartes-->


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


  <style>
    .container{
      font-style: oblique;
      font-family: Georgia, serif;

    }
  </style>
@endsection
