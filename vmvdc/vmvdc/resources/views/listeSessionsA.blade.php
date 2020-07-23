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
            <th scope="col">Effectif maximum</th>
            <th scope="col"></th>


          </tr>
        </thead>

        <tbody>
          <?php foreach($sessions as $session):?>
            <tr>

              <td><?= $session->date ?></td>
              <td><?= $session->heure?></td>
              <td><?=$session->effectifMax?></td>
              <td>
                <form action={{'suppressionSession'}} method="post" onsubmit="return confirm('Etes-vous sur ?');">
                  {{csrf_field()}}
                  <input type="text" hidden name="idSession" value=<?= $session->id ?>>
                  <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                </form>
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
