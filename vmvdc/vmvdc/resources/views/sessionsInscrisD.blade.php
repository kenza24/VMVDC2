@extends('layout')
@section('contenu')

<div class="container">
  <div class="shadow-lg p-3 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5" style="font-style: oblique; font-family: Georgia, serif;">
      <h3>Liste des sessions :</h3>

      <div style="postion:relative; float:right;">
      <!--  <a type="button" class="btn btn-xs btn-secondary" href="">Refuser une session</a> -->
      </div>
        <br>
        <br>
      <table class="table table-striped table-responsive-xl">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Enseignant</th>
            <th scope="col">Nom du lycée</th>
            <th scope="col">Niveau</th>

            <th scope="col"></th>

          </tr>
        </thead>

        <tbody>

            <tr>
              <?php foreach ($sessions as $session) : ?>

                  <!--AFFICHAGE DES INFOS DE LA SESSION -->
                  <td><?= $session->date?></td>
                  <td><?=$session->heure?></td>

                  <!--AFFICHAGE DES INFOS DE L'ENSEIGNANT -->
                  <?php foreach ($enseignants as $e) : //dd($enseignants); ?>


                      <!--Ce if sert a afficher le nom de l'enseignant correspondant a la session -->
                      <?php  if ($session->idEnseignant == $e->id) : ?>
                        <td><?= $e->nom. " ". $e->prenom?></td>
                      <?php endif;?>

                    <?php endforeach;?>


                  <!--- AFFICHAGE INFOS DE LA CLASSE -->
                  <?php foreach ($classes as $c): ?>


                      <!-- affiche la classe en fonction de l'idClasse de la session -->
                      <?php if ($session->idEnseignant == $c->idEnseignant): //dd($e->id)?>
                        <td><?=$c->etablissementScolaire ?></td>
                        <td><?=$c->niveau?> </td>
                      <?php endif;?>

                    <?php endforeach;?>

                        <td>
                          <form action={{'detailSessionD'}} method="post">
                            {{csrf_field()}}
                            <input type="text" hidden name="idSession" value=<?= $session->id ?>>
                            <button type="submit" class="btn btn-xs btn-secondary">Détails</button>
                          </form>
                        </td>
            </tr>
            <!-- fin foreach de la session -->
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
