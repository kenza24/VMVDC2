@extends ('layout')

@section('contenu')

<div class="contenu" style="background: url(content/bandeau-ibps.jpg) fixed no-repeat top; background-size: auto 500px;">

  <div>

     <div style="background-color: white; padding-top: 20px; border: 10px solid #11385b;font-style: oblique; font-family: Georgia, serif;">

    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex">
                <h3>Descriptif :</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md d-flex text-justify">
                <?= nl2br($descriptif) ?>
                <br>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex text-justify">
                <?= nl2br($equipeAdmin) ?>
                <br>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex">
                <h3>Mentions Légales :</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md d-flex text-justify">
                <?= nl2br($mentionsLegales) ?>
                <br>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex text-justify">
                <?= nl2br($equipeInfo) ?>
                <br>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex">
                <h3>Droit d'auteur et propriété intellectuelle :</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md d-flex text-justify">
                <?= nl2br($droits) ?>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex">
                <h3>Concept et design :</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md d-flex text-justify">
                <?= nl2br($conceptDesign) ?>
            </div>
        </div>
        <div class="row d-flex justify-content-around mt-5">
            <div class="col-md d-flex">
                <h3>Loi Informatique et Libertés :</h3>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md d-flex text-justify">
                <?= nl2br($loiInformatiqueEtLiberte) ?>
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
    </div>
  </div>

@endsection
