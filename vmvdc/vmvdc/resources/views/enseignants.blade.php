@extends ('layout')

@section('contenu')

<br>
<br>
<div class="col-md text-center text-wrap text-break content_center" style="color: white;font-style: oblique; font-family: Georgia, serif;">
  <!--<h1><?= $data[0]->nom ?></h1>-->
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
        <div class="mt-5 mb-3" style="text-align:center; display:inline-block">
          <a type="button" class="btn btn-outline-secondary" href={{('modificationInfosE')}}>Modifier mes informations</a>
        </div>
        <div style="margin-top:48px; margin-left:10px; font-family: Georgia, serif;">
        <form method="post" action={{route('suppressionE')}}  onsubmit="return confirm('Etes-vous sur ?');">
          {{csrf_field()}}
          <button type="submit"  class="btn btn-outline-danger">Supprimer mon compte</button>
        </form>
      </div>

  </div>

  </div>
</div><!--Fin container-->

<!-- Sessions -->
<div class="container">
  <div class="shadow-lg p-3 bg-black rounded" style="background-color:#B0C4DE;">
    <div class="col-md-12" style=" display: inline-block;">
      <div class="d-flex flex-row flex-wrap">

        <div class="col-md-3">
          <div class="card" style="background-color: #f5f5f5;">
            <!--  <img class="card-img-top" src="content/enseignants.png" alt="">-->
            <div class="card flex-md-row flex-wrap">
              <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block text-secondary">Pré-Inscrivez votre classe !</strong>
                <a class="btn btn-outline-secondary btn-sm" role="button" href={{('preInscriptionE')}}>Y aller !</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card" style="background-color: #f5f5f5;">
            <!--<img class="card-img-top" src="content/doctorantes.png" alt="">-->
            <div class="card-body d-flex flex-column flex-wrap align-items-start">
              <strong class="d-inline-block text-secondary">Mes sessions</strong>
              <a class="btn btn-outline-secondary btn-sm" role="button" href={{('sessionsE')}} style="position:center">Y aller !</a>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card" style="background-color: #f5f5f5;">
            <!--<img class="card-img-top" src="content/doctorantes.png" alt="">-->
            <div class="card-body d-flex flex-column flex-wrap align-items-start">
              <strong class="d-inline-block text-secondary">Mes pré-inscriptions</strong>
              <a class="btn btn-outline-secondary btn-sm" role="button" href={{('listePreInscritE')}} style="position:center">Y aller !</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <br>
</div>

    <style>
      .container{
        font-style: oblique;
        font-family: Georgia, serif;

      }
    </style>
@endsection
