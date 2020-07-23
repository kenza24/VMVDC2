@extends('layout')
@section('contenu')

<div class="container">
  <div class="shadow-lg p-3 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5" style="font-style: oblique; font-family: Georgia, serif;">
      <h3>Liste des doctorants :</h3>
      <div style="position:relative; float:left;">
        <a type="button" class="btn btn-xs btn-secondary" href="inscriptionsD">Inscrire un doctorant</a>
      </div>
      <br>
      <br>


      <table class="table table-striped table-responsive-xl">
        <thead>
          <tr>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($doctorants as $key => $doctorant):?>
            <tr>
              <td><?= $doctorant->prenom ?></td>
              <td><?= $doctorant->nom ?></td>
              <td><?= $doctorant->email ?></td>
              <td>  <form method="post" action={{route('suppressionDAdmin')}}  onsubmit="return confirm('Etes-vous sur ?');">
                  {{csrf_field()}}
                  <input type="text" hidden name="idD" value=<?= $doctorant->id?>>
                  <button type="submit" class="btn btn-xs btn-secondary">Supprimer le doctorant</button>
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
