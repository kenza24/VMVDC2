@extends('layout')
@section('contenu')

<div class="container">
  <br>
  <div class="shadow-lg p-3 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5" style="font-style: oblique; font-family: Georgia, serif;">
      <h3>Liste des classes :</h3>
      <br>

    <!--Compteurs-->
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            Nombre de classes sélectionnées: <?= $nbClasses ?>
          </div>
          <div class="col-md-3">
            Nombre de Rep : <?= $nbREP ?>
          </div>
          <div class="col-md-3">
            Nombre de Terminales : <?= $nbTerminales ?>
          </div>
          <div class="col-md-3">
            Nombre de Premières : <?= $nbPremieres ?>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-3">
            Académie de Versailles : <?= $academies['versailles'] ?>
          </div>
          <div class="col-md-3">
            Académie de Paris : <?= $academies['paris'] ?>
          </div>
          <div class="col-md-3">
            Académie de Créteil : <?= $academies['creteil'] ?>
          </div>
        </div>
        <br>
        <div class="row">
        <?php foreach ($lycees as $nomLycee => $nbSelection) : ?>
            <div class="col-md-3">
              Lycée <?= $nomLycee ?> : <?= $nbSelection ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <br>
      <?php if($etatSessions == 0): ?>
        <a type="button" class="btn btn-xs btn-secondary" href={{'validationSessions'}} onclick="return confirm('Etes-vous sûr de vouloir valider les sessions ? Vous ne pourrez plus les modifier.')">Valider la sélection des classes</a>
      <?php else: ?>
        <a type="button" class="btn btn-xs btn-secondary" href={{'invalidationSessions'}} onclick="return confirm('Etes-vous sûr de vouloir invalider les sessions ? En cas de revalidation des sessions, l\'accord de l\'enseignant sera redemandé.')">Invalider les sessions</a>
      <?php endif; ?>
      <br>
      <br>

    <!--Tableau-->
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Zone d'éducation</th>
            <th scope="col">Niveau</th>
            <th scope="col">Académie</th>
            <th scope="col">Ville</th>
            <th scope="col">Code postal</th>
            <th scope="col">Etablissement</th>
            <th scope="col">Enseignant</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dates as $keyDates => $date):?> <!-- keyDates = id de la session de la date-->
            <?php foreach($classes as $keyClasses => $classe):?>
              <!--si, à cette date, (la session n'a pas de classe ET le choix1 de la classe == la date ET la classe n'est pas sur liste noire)
                    OU (la session a une classe ET la classe de la session correspond a la classe en cours)-->
              <?php /*var_dump(/*($sessions[$keyDates]/*->idClasse == null and $classe->choixSession1 == $keyDates and !in_array($classe->id, $listeNoire))
                    or ($sessions[$keyDates]->idClasse != null and $sessions[$keyDates]->idClasse == $classe->id))*/ ?>
              <?php if(($sessions[$keyDates]->idClasse == null and $classe->choixSession1 == $keyDates and !in_array($classe->id, $listeNoire))
                    or ($sessions[$keyDates]->idClasse != null and $keyDates == $classe->choixSession1 and $sessions[$keyDates]->idClasse == $classe->id)): ?>
                    <?php //var_dump($sessions[$keyDates]); ?>
                <tr
                  <?php if($sessions[$keyDates]->idClasse != null):?>
                    class="table-success"
                  <?php endif; ?>
                >
                  <?php if($etatSessions == 0): ?>
                    <?php if($sessions[$keyDates]->idClasse == null): ?>
                      <td>
                        <form action={{'selectionClasse'}} method="post">
                        {{csrf_field()}}
                          <input type="text" hidden name="idClasse" value=<?= $classe->id ?>>
                          <input type="text" hidden name="idSession" value=<?= $classe->choixSession1 ?>>
                          <button type="submit" class="btn btn-outline-success">Sélectionner</button>
                        </form>
                      </td>
                    <?php else: ?>
                      <td>
                        <form action={{'deselectionClasse'}} method="post" onsubmit="return confirm('Etes-vous sur ?');">
                        {{csrf_field()}}
                          <input type="text" hidden name="idSession" value=<?= $classe->choixSession1 ?>>

                          <button type="submit" class="btn btn-outline-danger">Désélectionner</button>
                        </form>
                      </td>
                    <?php endif; ?>
                  <?php else: ?>
                    <td></td>
                  <?php endif; ?>
                  <td><?= $sessions[$classe->choixSession1]->date ?></td>
                  <td><?= $sessions[$classe->choixSession1]->heure ?></td>
                  <td><?= $classe->rep ?></td>
                  <td><?= ucfirst($classe->niveau) ?></td>
                  <td><?=ucfirst($classe->academie) ?></td>
                  <td><?=$classe->ville ?></td>
                  <td><?=$classe->codePostal ?></td>
                  <td><?=$classe->etablissementScolaire ?></td>
                  <td><?=$enseignants[$classe->idEnseignant] ?></td>
                </tr>
              <!--si, à cette date, (la session n'a pas de classe ET le choix2 de la classe == la date ET la classe n'est pas sur liste noire)
                  OU (la session a une classe ET la classe de la session correspond a la classe en cours)-->
              <?php elseif(($sessions[$keyDates]->idClasse == null and $classe->choixSession2 == $keyDates and !in_array($classe->id, $listeNoire))
                    or ($sessions[$keyDates]->idClasse != null and $keyDates == $classe->choixSession2 and $sessions[$keyDates]->idClasse == $classe->id)): ?>
                <tr
                  <?php if($sessions[$keyDates]->idClasse != null):?>
                    class="table-success"
                  <?php endif; ?>
                >
                  <?php if($etatSessions == 0): ?>
                    <?php if($sessions[$keyDates]->idClasse == null): ?>
                      <td>
                        <form action={{'selectionClasse'}} method="post">
                        {{csrf_field()}}
                          <input type="text" hidden name="idClasse" value=<?= $classe->id ?>>
                          <input type="text" hidden name="idSession" value=<?= $classe->choixSession2 ?>>
                          <button type="submit" class="btn btn-outline-success" >Sélectionner</button>
                        </form>
                      </td>
                    <?php else: ?>
                      <td>
                        <form action={{'deselectionClasse'}} method="post" onsubmit="return confirm('Etes-vous sur ?');">
                        {{csrf_field()}}
                          <input type="text" hidden name="idSession" value=<?= $classe->choixSession2 ?>>
                          <button type="submit" class="btn btn-outline-danger">Désélectionner</button>
                        </form>
                      </td>
                    <?php endif; ?>
                  <?php else: ?>
                    <td></td>
                  <?php endif; ?>
                  <td><?= $sessions[$classe->choixSession2]->date ?></td>
                  <td><?= $sessions[$classe->choixSession2]->heure ?></td>
                  <td><?= $classe->rep ?></td>
                  <td><?= ucfirst($classe->niveau) ?></td>
                  <td><?= ucfirst($classe->academie) ?></td>
                  <td><?= $classe->ville ?></td>
                  <td><?= $classe->codePostal ?></td>
                  <td><?= $classe->etablissementScolaire ?></td>
                  <td><?=$enseignants[$classe->idEnseignant] ?></td>
                </tr>
              <!--si, à cette date, (la session n'a pas de classe ET le choix2 de la classe == la date ET la classe n'est pas sur liste noire)
                  OU (la session a une classe ET la classe de la session correspond a la classe en cours)-->
              <?php elseif(($sessions[$keyDates]->idClasse == null and $classe->choixSession3 == $keyDates and !in_array($classe->id, $listeNoire))
                    or ($sessions[$keyDates]->idClasse != null and $keyDates == $classe->choixSession3 and $sessions[$keyDates]->idClasse == $classe->id)): ?>
                <tr
                  <?php if($sessions[$keyDates]->idClasse != null):?>
                    class="table-success"
                  <?php endif; ?>
                >
                  <?php if($etatSessions == 0): ?>
                    <?php if($sessions[$keyDates]->idClasse == null): ?>
                      <td>
                        <form action={{'selectionClasse'}} method="post">
                        {{csrf_field()}}
                          <input type="text" hidden name="idClasse" value=<?= $classe->id ?>>
                          <input type="text" hidden name="idSession" value=<?= $classe->choixSession3 ?>>
                          <button type="submit" class="btn btn-outline-success">Sélectionner</button>
                        </form>
                      </td>
                    <?php else: ?>
                      <td>
                        <form action={{'deselectionClasse'}} method="post" onsubmit="return confirm('Etes-vous sur ?');">
                        {{csrf_field()}}
                          <input type="text" hidden name="idSession" value=<?= $classe->choixSession3 ?>>
                          <button type="submit" class="btn btn-outline-danger">Désélectionner</button>
                        </form>
                      </td>
                    <?php endif; ?>
                  <?php else: ?>
                    <td></td>
                  <?php endif; ?>
                  <td><?= $sessions[$classe->choixSession3]->date ?></td>
                  <td><?= $sessions[$classe->choixSession3]->heure ?></td>
                  <td><?= $classe->rep ?></td>
                  <td><?= ucfirst($classe->niveau) ?></td>
                  <td><?= ucfirst($classe->academie) ?></td>
                  <td><?= $classe->ville ?></td>
                  <td><?= $classe->codePostal ?></td>
                  <td><?= $classe->etablissementScolaire ?></td>
                  <td><?= $enseignants[$classe->idEnseignant] ?></td>
                </tr>
              <?php endif; ?>
            <?php endforeach;?>
          <?php endforeach;?>
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
