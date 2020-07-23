@extends('layout')
@section('contenu')

<div class="container" action="/preInscriptionE">
  <br>
  <br>
    <div class="card bg-light">

        <article class="card-body mx-auto" style="width: 800px;font-family: Georgia, serif;">
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
    <br>
</div>

@endsection
