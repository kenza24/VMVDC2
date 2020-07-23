@extends('layout')
@section('contenu')

<div class="container">
  <br>
  <div class="shadow-lg p-3 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5" style="font-style: oblique; font-family: Georgia, serif;">
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

              <td><?=(isset($c->choixSession1)) ? $sessionsOrdonnees[$c->choixSession1]->date : '-' ?> - <?=(isset($c->choixSession1)) ? $sessionsOrdonnees[$c->choixSession1]->heure : '-'?> |
              <?= (isset($c->choixSession2)) ? $sessionsOrdonnees[$c->choixSession2]->date : '-' ?> - <?=(isset($c->choixSession2)) ? $sessionsOrdonnees[$c->choixSession2]->heure : '-'?> |
              <?=(isset($c->choixSession3)) ? $sessionsOrdonnees[$c->choixSession3]->date : '-' ?> - <?=(isset($c->choixSession3)) ? $sessionsOrdonnees[$c->choixSession3]->heure : '-'?></td>
            <td></td>
            <td><?= $c->etablissementScolaire ?></td>
            <td><?=$c->niveau?></td>
          </tr>

      <?php endforeach?>

        </tbody>
      </table>
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
