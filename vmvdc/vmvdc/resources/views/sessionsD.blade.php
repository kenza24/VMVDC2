@extends('layout')
@section('contenu')

<div class="container">
  <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5 mb-3" style="font-style: oblique; font-family: Georgia, serif;">
      <h3>Liste des sessions </h3>

      <div style="postion:relative; float:right;">
      <!--  <a type="button" class="btn btn-xs btn-secondary" href="">Refuser une session</a> -->
      </div>
        <br>
        <br>
      <table class="table table-striped table-responsive-xl">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Effectif maximum</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($sessions as $session):
            //dd($participations);
            //dd(count($sessions));
            //dd($sessions);
            ?>
            <tr>

            <?php
            //dd($idS);
            //if ($idS == null): ?>





            <!-- si l'id de la session (tableau) correxpond a l'id de la sessions courante -> il est inscrit donc desinscriptionDoctorant -->
            <?php    //dd($idS);
                  //on recupere les idSession dans un nveau tableau
                  //$idS=$value->idSession;

                  //dd($value->idSession);
              //if($session->id != null) :
                //dd($session->id);
                if (in_array($session->id, $idS)):
                //dd($value);
                ?>
                  <!-- si ca correspond c'est qu'il est deja inscrit -->

                    <td>
                      <form method="post" action={{route('desinscriptionD')}}  onsubmit="return confirm('Etes-vous sur ?');">
                        {{csrf_field()}}
                        <input type="text" hidden name="idSession" value=<?= $session->id?>>
                        <button type="submit" class="btn btn-outline-danger">Se désinscrire</button>
                      </form>
                    </td>
                    <!--si ca ne correspond pas, il n'est pas inscrit -->

                <?php  else :?>
                  <td>
                    <form action={{route('inscriptionD')}} method="post">
                      {{csrf_field()}}
                      <!-- recuperer les id ? -->
                      <input type="text" hidden name="idSession" value=<?= $session->id?>>
                      <button type="submit" class="btn btn-outline-success"> S'inscrire </a>
                      </form>
                    </td>
                  <?php endif; ?>


                  <td><?= $session->date ?></td>
                  <td><?= $session->heure?></td>
                  <td><?=$session->effectifMax?></td>
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
