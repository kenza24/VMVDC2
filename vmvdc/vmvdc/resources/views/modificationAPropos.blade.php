@extends('layout')
@section('contenu')



<div class="contenu" style="background: url(content/bandeau-ibps.jpg) fixed no-repeat top; background-size: 100%;">
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
</div>
<div class="container" action="/preInscriptionE">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="width: 800px;">
            <h4 class="card-title mt-3 text-center">Modification de la page "A propos"</h4>
            <br>
            <form action={{'updateAPropos'}} method="post">
            {{csrf_field()}}

                <!-- Descriptif du projet -->
                <h6>Descriptif :</h6>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" name="descriptif" style="height : 20em;"><?=
                        $descriptif
                    ?></textarea>
                </div>
                <br>

                <!-- Equipe admin -->
                <h6>Equipe d'administration :</h6>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" name="equipeAdmin" style="height : 20em;"><?=
                        $equipeAdmin
                    ?></textarea>
                </div>
                <br>

                <!-- Mentions Legales -->
                <h6>Mentions Légales :</h6>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" name="mentionsLegales" style="height : 20em;"><?=
                        $mentionsLegales
                    ?></textarea>
                </div>
                <br>

                <!-- Equipe Info -->
                <h6>Equipe informatique :</h6>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" name="equipeInfo" style="height : 20em;"><?=
                        $equipeInfo
                    ?></textarea>
                </div>
                <br>

                <!-- Droits -->
                <h6>Droits d'auteur et propriété intellectuelle :</h6>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" name="droits" style="height : 20em;"><?=
                        $droits
                    ?></textarea>
                </div>
                <br>

                <!-- Concept et design -->
                <h6>Concept et design :</h6>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" name="conceptDesign" style="height : 20em;"><?=
                        $conceptDesign
                    ?></textarea>
                </div>
                <br>

                <!-- Concept et design -->
                <h6>Loi Informatique et Libertés :</h6>
                <div class="input-group">
                    <textarea class="form-control" aria-label="With textarea" name="loiInformatiqueEtLiberte" style="height : 20em;"><?=
                        $loiInformatiqueEtLiberte
                    ?></textarea>
                </div>
                <br>

                <!--BOUTON-->
                <button type="submit" class="btn btn-secondary btn-block">Valider</button>

            </form>
        </article>
    </div>
</div>

@endsection
