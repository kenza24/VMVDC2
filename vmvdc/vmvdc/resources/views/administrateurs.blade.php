@extends ('layout')

@section('contenu')

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

      <div class="shadow-lg p-3 mb-5 bg-black rounded d-flex flex-wrap text-break justify-content-center" style="margin-left:2%; margin-right: 2%">
        <div class="col-md-4 mb-1 mt-1">
          <dt>Votre email : <?= $data[0]->email ?></dt>
        </div>
        <div class="col-md-4 mb-1 mt-1">
          <dt>Votre nom : <?= $data[0]->nom ?></dt>
        </div>
        <form method="post" action={{route('suppressionA')}}  onsubmit="return confirm('Etes-vous sur ?');">
          {{csrf_field()}}
          <button type="submit" class="btn btn-xs btn-secondary">Supprimer mon compte</button>
        </form>
      <!--</dl>-->

      <div class="mt-5 mb-3" style="text-align:center;">
        <a type="button" class="btn btn-xs btn-secondary" href={{('modificationInfosA')}}>Modifier mes informations</a>
        <a type="button" class="btn btn-xs btn-secondary" href="inscriptionsA">Inscrire un administrateur</a>
        <a type="button" class="btn btn-xs btn-secondary" href={{('ajoutSession')}}>Ajouter une date de session</a>
        <a type="button" class="btn btn-xs btn-secondary" href={{('modificationAccueil')}}>Modifier les informations de la page d'accueil</a>
        <a type="button" class="btn btn-xs btn-secondary" href={{('modificationAPropos')}}>Modifier les informations de la page "A propos"</a>
        <!--<a type="button" class="btn btn-xs btn-secondary" href="detailSessionD">Voir details</a>-->
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
            <div class="card" style="background-color: #f5f5f5;">
              <!--<img class="card-img-top" src="content/doctorantes.png" alt="">-->
                <div class="card-body d-flex flex-column align-items-start">
                  <strong class="d-inline-block text-secondary">Les doctorants</strong>
                  <a class="btn btn-outline-secondary btn-sm" role="button" href={{('listeDoctorantsA')}} style="position:center">Y aller !</a>
                </div>
            </div>
          </div>

        <!--Carte Enseignants-->
          <div class="col-md-3">
            <div class="card" style="background-color: #f5f5f5;">
            <!--  <img class="card-img-top" src="content/enseignants.png" alt="">-->
              <div class="card flex-md-row">
                <div class="card-body d-flex flex-column align-items-start">
                  <strong class="d-inline-block text-secondary">Les enseignants</strong>
                  <a class="btn btn-outline-secondary btn-sm" role="button" href={{('listeEnseignantsA')}}>Y aller !</a>
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
                    <strong class="d-inline-block mb-2 text-secondary">Liste des sessions</strong>
                    <a class="btn btn-outline-secondary btn-sm" role="button" href={{('listeSessionsA')}}>Y aller !</a>
                  </div>
                </div>
              </div>
            </div>
        <!--Carte Sessions-->
          <div class="col-md-3">
            <div class="card" style="border: none; border-radius: 0; background-color: #f5f5f5; margin:0;">
              <!--<img class="card-img-top" src="content/enseignants.png" alt="">-->
              <div class="card flex-md-r-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start" style="width:250px; height:100px;">
                  <strong class="d-inline-block mb-2 text-secondary">Les sessions validées</strong>
                  <a class="btn btn-outline-secondary btn-sm" role="button" href={{('sessionsA')}}>Y aller !</a>
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
                  <strong class="d-inline-block mb-2 text-secondary">Sélection des classes</strong>
                  <a class="btn btn-outline-secondary btn-sm" role="button" href={{('classesA')}}>Y aller !</a>
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
                  <strong class="d-inline-block mb-2 text-secondary">Toutes les classes pré-inscrites</strong>
                  <a class="btn btn-outline-secondary btn-sm" role="button" href={{('preInscriptionsA')}}>Y aller !</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div><!--fin cartes-->

  <style>
    .container{
      font-style: oblique;
      font-family: Georgia, serif;
    }

    .btn-secondary {
      margin-top: 10px;
      margin-bottom: 10px;
    }
  </style>
@endsection
