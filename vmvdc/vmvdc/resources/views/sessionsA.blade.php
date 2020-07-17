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
      <form action={{route('deconnexiond')}}>
       <button type="submit" class="btn btn-primary btn-block">Se déconnecter</button>
     </form>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5 mb-3" style="font-style: oblique; font-family: Georgia, serif;">
      <h3>Liste des sessions :</h3>
      <div style="position:relative; float:left;">
        <a type="button" class="btn btn-xs btn-secondary" href="/ajoutSession">Ajouter une nouvelle session</a>
      </div>
      <div style="position:relative; float:right;">
        <a type="button" class="btn btn-xs btn-secondary" href="">Supprimer une session</a>
      </div>

      <br>
      <br>
      <table class="table table-striped table-responsive-xl">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Enseignant</th>
            <th scope="col">Doctorants</th>
            <th scope="col">Accompagnateurs</th>
            <th scope="col">Effectif Classe</th>
            <th scope="col">Administrateur référent</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($sessions as $session):?>
            <tr>
              <td><?= $session->date ?></td>
              <td><?= $enseignants[$session->id] ?></td>
              <td>
                <?php foreach ($infoDoctorants as $infoDoctorant):?>
                  <?php if ($infoDoctorant['idSession'] === $session->id):?>
                    <?="- ".$infoDoctorant['prenom']." ".$infoDoctorant['nom']?>
                  <?php endif;?>
                <?php endforeach;?>
              </td>
              <td><?= $accompagnateurs[$session->id] ?></td>
              <td><?= $session->effectifClasse ?></td>
              <td><?= $administrateur[$session->id] ?></td>
              <td>
                <?php if($session->idAdminReferent == null): ?>
                  <form action={{'accueilSession'}} method="post">
                    {{csrf_field()}}
                      <input type="text" hidden name="idSession" value=<?= $session->id ?>>
                      <input type="text" hidden name="idAdmin" value=<?= $_SESSION['id'] ?>>
                      <button type="submit" class="btn btn-success">Accueillir</button>
                    </form>
                <?php elseif($session->idAdminReferent == $_SESSION['id']): ?>
                  <form action={{'desistementSession'}} method="post">
                    {{csrf_field()}}
                      <input type="text" hidden name="idSession" value=<?= $session->id ?>>
                      <input type="text" hidden name="idAdmin" value=<?= $_SESSION['id'] ?>>
                      <button type="submit" class="btn btn-danger">Se désister</button>
                    </form>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach;?>
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
