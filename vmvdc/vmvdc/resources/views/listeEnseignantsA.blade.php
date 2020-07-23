@extends('layout')
@section('contenu')

<div class="container">
  <div class="shadow-lg p-3 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5 " style="font-style: oblique; font-family: Georgia, serif;">
      <h3>Liste des enseignants :</h3>
      <table class="table table-striped table-responsive-xl">
        <thead>
          <tr>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">E-mail</th>
            <th scope="col">numéro de téléphone</th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($enseignants as $key => $enseignant):?>
            <tr>
              <td><?= $enseignant->prenom ?></td>
              <td><?= $enseignant->nom ?></td>
              <td><?= $enseignant->email ?></td>
              <td><?= $enseignant->numTel ?></td>

              <td>  <form method="post" action={{route('suppressionEAdmin')}}  onsubmit="return confirm('Etes-vous sur ?');">
                  {{csrf_field()}}
                  <input type="text" hidden name="idE" value=<?= $enseignant->id?>>
                  <button type="submit" class="btn btn-xs btn-secondary">Supprimer l'enseignant</button>
                </form></td>
            </tr>
          <?php endforeach;?>
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
