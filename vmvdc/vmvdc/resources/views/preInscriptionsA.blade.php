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
      <br>

    <!--Tableau-->
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col">Enseignant</th>  
            <th scope="col">Niveau</th>
            <th scope="col">REP</th>
            <th scope="col">Académie</th>
            <th scope="col" colspan="3">Choix sessions</th>
            <th scope="col">Etablissement Scolaire</th>
            <th scope="col">Code postal</th>
            <th scope="col">Effectif de la classe</th>
            <th scope="col">Ville</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($classes as $keyClasses => $classe): ?>
                <tr>
                    <td><?= $enseignants[$classe->idEnseignant] ?></td>
                    <td><?= $classe->niveau ?></td>
                    <td><?= $classe->rep ?></td>
                    <td><?= $classe->academie ?></td>
                    <td><?= (isset($classe->choixSession1)) ? $sessionsOrdonnees[$classe->choixSession1]->date : '-' ?> - <?= (isset($classe->choixSession1)) ? $sessionsOrdonnees[$classe->choixSession1]->heure : '-'?></td>
                    <td><?= (isset($classe->choixSession2)) ? $sessionsOrdonnees[$classe->choixSession2]->date : '-' ?> - <?= (isset($classe->choixSession2)) ? $sessionsOrdonnees[$classe->choixSession2]->heure : '-'?></td>
                    <td><?= (isset($classe->choixSession3)) ? $sessionsOrdonnees[$classe->choixSession3]->date : '-' ?> - <?= (isset($classe->choixSession3)) ? $sessionsOrdonnees[$classe->choixSession3]->heure : '-'?></td>
                    <td><?= $classe->etablissementScolaire ?></td>
                    <td><?= $classe->codePostal ?></td>
                    <td><?= $classe->effectifClasse ?></td>
                    <td><?= $classe->ville ?></td>
                </tr>
            <?php endforeach; ?>
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