@extends('layout')
@section('contenu')

<div class="container">
  <div class="shadow-lg p-3 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5" style="font-style: oblique; font-family: Georgia, serif;">
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
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($sessions as $session):?>
            <tr
            <?php if ($session->acceptation == 1): ?>
              class="table-success"
            <?php elseif($session->acceptation == 2): ?>
              class="table-danger"
            <?php endif; ?>
            >
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
              <td>
                <form action={{'detailSessionA'}} method="post">
                  {{csrf_field()}}
                  <input type="text" hidden name="idSession" value=<?= $session->id ?>>
                  <button type="submit" class="btn btn-xs btn-secondary">Détails</button>
                </form>
              </td>
              </td>
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

<style>
  .container{
    font-style: oblique;
    font-family: Georgia, serif;

  }
</style>

@endsection
