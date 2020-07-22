@extends('layout')
@section('contenu')

<div class="container">
  <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5 mb-3" style="font-style: oblique; font-family: Georgia, serif;">
      <h3>Liste des sessions :</h3>
      <div style="position:relative; float:left;">
        <a type="button" class="btn btn-xs btn-secondary" href={{'preInscriptionE'}}>S'inscrire à une nouvelle session</a>
      </div>
      <div style="position:relative; float:right;">
      <!--  <a type="button" class="btn btn-xs btn-secondary" href="">Refuser une session</a> -->
      </div>
      <br>
      <br>
      <table class="table table-striped table-responsive-xl">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Nom de la classe</th>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Doctorants</th>
            <th scope="col">Accompagnateurs</th>
            <th scope="col">Nombre d'élèves</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($sessions as $keySessions => $session):?>
            <tr>
              <td>
                <?php if($session->acceptation != 1 and $session->acceptation != 2): ?>
                  <form action={{'acceptation'}} method="post">
                  {{csrf_field()}}
                    <input type="text" hidden name="idSession" value=<?= $session->id ?>>
                    <button type="submit" class="btn btn-success">Accepter</button>
                  </form>
                  <br>
                  <form action={{'refus'}} method="post">
                  {{csrf_field()}}
                    <input type="text" hidden name="idSession" value=<?= $session->id ?>>
                    <button type="submit" class="btn btn-danger">Refuser</button>
                  </form>
                <?php endif; ?>
              </td>
              <td><?= $session->nom ?></td>
              <td><?= $session->date ?></td>
              <td><?= $session->heure ?></td>
              <td><?= $doctorantSession[$session->id] ?></td>
              <td><?= $session->nb_accompagnateurs ?></td>
              <td><?= $session->effectifClasse ?></td>
              <td>
                <form action={{'detailSessionE'}} method="post">
                  {{csrf_field()}}
                  <input type="text" hidden name="idSession" value=<?= $session->id ?>>
                  <button type="submit" class="btn btn-xs btn-secondary">Détails</button>
                </form>
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
