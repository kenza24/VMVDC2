@extends('layout')
@section('contenu')

<div class="contenu" style="background: url(content/bandeau-ibps.jpg) fixed no-repeat top; background-size: 100%;">
    <!-- En-tete -->
  <div class="container-fluid">
    <div class="row" style="background-color: #11385b;">
      <a href="">
        <img src="content/ibps-logo.jpg" alt="Logo-IBPS" class="float-left" style="height: 100px;">
      </a>
      <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:50px; margin-top: 25px; margin-left: 100px;">
        <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5 mb-3" style="font-style: oblique; font-family: Georgia, serif;">
      <h3>Liste de vos pré-inscriptions :</h3>

      <div style="position:relative; float:right;">
      <!--  <a type="button" class="btn btn-xs btn-secondary" href="">Refuser une session</a> -->
      </div>
      <br>
      <br>
      <table class="table table-striped table-responsive-xl">
        <thead>
          <tr>

            <th scope="col">Choix des dates</th>
            <th scope="col">Nom de la classe</th>
            <th scope="col">Lycée</th>
            <th scope="col">Niveau</th>

          </tr>
        </thead>
        <tbody>
          <?php foreach ($classes as $c) : ?>
          <tr>

              <td><?=htmlspecialchars((isset($c->choixSession1)) ? $sessionsOrdonnees[$c->choixSession1]->date : '-') ?>  <?=htmlspecialchars((isset($c->choixSession1)) ? $sessionsOrdonnees[$c->choixSession1]->heure : '-')?> |
              <?= htmlspecialchars((isset($c->choixSession2)) ? $sessionsOrdonnees[$c->choixSession2]->date : '-') ?> - <?=htmlspecialchars((isset($c->choixSession2)) ? $sessionsOrdonnees[$c->choixSession2]->heure : '-')?> |
              <?=htmlspecialchars((isset($c->choixSession3)) ? $sessionsOrdonnees[$c->choixSession3]->date : '-' )?> - <?=htmlspecialchars ((isset($c->choixSession3)) ? $sessionsOrdonnees[$c->choixSession3]->heure : '-')?></td>
            <td></td>
            <td><?= htmlspecialchars($c->etablissementScolaire) ?></td>
            <td><?=htmlspecialchars($c->niveau)?></td>
          </tr>

      <?php endforeach?>

        </tbody>
      </table>
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
