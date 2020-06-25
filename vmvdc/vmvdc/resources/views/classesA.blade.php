@extends('layout')
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

<div class="container mt-5">
  <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5 mb-3" style="font-style: oblique; font-family: Georgia, serif;">
      <h3>Liste des classes :</h3>
      <table class="table table-striped table-responsive-xl">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Zone d'éducation</th>
            <th scope="col">Niveau</th>
            <th scope="col">Académie</th>
            <th scope="col">Ville</th>
            <th scope="col">Code postal</th>
            <th scope="col">Etablissement</th>
            <th scope="col">Enseignant</th>
            <th scope="col">Déjà participé</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dates as $key => $date):?>
            <?php foreach($classes as $key => $classe):?>
              <?php if($classe->choixSession1 == key($dates)): ?>
                <tr>
                  <td><?= $sessions[$classe->choixSession1]->date ?></td>
                  <td><?= $sessions[$classe->choixSession1]->heure ?></td>
                  <td><?= $classe->rep ?></td>
                  <td><?= $classe->niveau ?></td>
                  <td><?= $classe->academie ?></td>
                  <td><?= $classe->ville ?></td>
                  <td><?= $classe->codePostal ?></td>
                  <td><?= $classe->etablissementScolaire ?></td>
                  <td><?= $enseignants[$classe->idEnseignant] ?></td>
                  <td><?= $classe->dejaVenu ?></td>
                </tr>
                <?php elseif($classe->choixSession2 == key($dates)): ?>
                <tr>
                  <td><?= $sessions[$classe->choixSession2]->date ?></td>
                  <td><?= $sessions[$classe->choixSession2]->heure ?></td>
                  <td><?= $classe->rep ?></td>
                  <td><?= $classe->niveau ?></td>
                  <td><?= $classe->academie ?></td>
                  <td><?= $classe->ville ?></td>
                  <td><?= $classe->codePostal ?></td>
                  <td><?= $classe->etablissementScolaire ?></td>
                  <td><?= $enseignants[$classe->idEnseignant] ?></td>
                  <td><?= $classe->dejaVenu ?></td>
                </tr>
              <?php endif; ?>
            <?php endforeach;?>
            <?php next($dates) ?>
          <?php endforeach;?>
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