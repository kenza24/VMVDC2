@extends('layout')
@section('contenu')

<!-- contenu -->
  <div class="container pt-3 pb-3">
    <br>
    <div class="shadow-lg bg-blue rounded pt-3 pb-3" style="background-color: #B0C4DE;">
      <div class="col-md text-center text-wrap text-break pl-5 pr-5"style="font-style: oblique; font-family: Georgia, serif; text-align:center;">
        <br>
        <h2><strong> Session du <?=$session->date ?><strong></h2>
        <div class="container pt-3 pb-3" style="background-color:#B0C4DE;font-style: oblique; font-family: Georgia, serif; text-align:center;">


        <!-- Inforamtions principales -->
          <table class="table table-striped table-responsive-xl" style="font-size:20px;">
            <thead>
              <tr>
                <th scope="col">Enseignant</th>
                <th scope="col">Doctorant(s)</th>
                <th scope="col">Nombres d'élèves</th>
                <th scope="col">Niveau de la classe</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="font-size:18px;"><?= $enseignant->prenom." ".$enseignant->nom ?></td>
                <td><?php foreach ($doctorants as $doctorant): ?>
                    <li style="font-size:18px"><?= $doctorant->prenom." ".$doctorant->nom." : ".$doctorant->email ?></li>
                <?php endforeach; ?></td>
                <td style="font-size:18px;"> <?= $session->effectifClasse ?></td>
                <td style="font-size:18px;"><?= ucfirst($session->niveau) ?></td>
              </tr>
            </tbody>
          </table>

        <!-- fichiers et details -->
          <?php if(isset($fichiers[0])):?>
            <h5><strong> Documents liés à la sessions :</strong></h5>
            <div class="list-group">
              <?php foreach($fichiers as $fichier): ?>
                <form action={{'telechargementA'}} method="post">
                  {{csrf_field()}}
                  <input type="text" hidden name="chemin" value=<?= $fichier->fichiers ?>>
                  <button type="submit" class="btn btn-light"><?= $fichier->nomFichier ?></button>
                </form>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <form action={{'detailSessionA'}} enctype="multipart/form-data" method="POST">
            {{csrf_field()}}
            <div class="pt-3 pb-3">
              <h5><strong>Choisissez un document :</br>(Type acceptés : .png, .gif, .jpg, .jpeg, .pdf, .docx, .doc, .txt, .xls, .xlsx, .pptx, .ppt, .odp, .xml, .rtf | Taille maximum : 2Mo)</strong></h5>
            </div>
            <input type="file" name="fichiers[]" style="font-size:20px" multiple>
            <div class="pt-3 pb-3">
              <label style="font-size:20px">Informations complémentaires : </label>
            </div>
            <input type="text" hidden name="idSession" value=<?= $session->id ?>>
            <textarea name="details" class="md-textarea form-control" rows="5" style="width:500px; margin:auto;"><?= $session->details ?></textarea>
            <button type="submit" class="btn btn-secondary btn-block mt-3 mb-3" style="width:100px; margin:auto;">Valider</button>
          </form>
        </div>
      </div>
    </div>
    <br>
  </div>

@endsection
