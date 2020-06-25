@extends('layout')
@section('contenu')

<body>
    <!-- En-tete -->
  <div class="container-fluid">
    <div class="row" style="background-color: #11385b;">
      <a href="">
        <img src="content/ibps-logo.jpg" alt="Logo-IBPS" class="float-left" style="height: 100px;">
      </a>
      <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:50px; margin-top: 25px; margin-left: 100px;">
        <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
      </div>
    </div>
  </div>
</div>

<br>
<hr>

<div class="card bg-light">
  <article class="card-body mx-auto" style="max-width: 400px;">
    <h4 class="card-title mt-3 text-center">Ajoutez une session !</h4>
    <p class="divider-text">
      <span class="bg-light"></span>
    </p>
    <form action={{('ajoutSession')}} method="post">
      {{csrf_field()}}

    <!--Date-->
      <label for="custom-select col-md-6">Date :</label>
      <div class="form-row">
        <select class="custom-select col-md-6" name="jour">
          <option selected>Jour</option>
          <option value="1"> 1 </option>
          <option value="2"> 2 </option>
          <option value="3"> 3 </option>
          <option value="4"> 4 </option>
          <option value="5"> 5 </option>
          <option value="6"> 6 </option>
          <option value="7"> 7 </option>
          <option value="8"> 8 </option>
          <option value="9"> 9 </option>
          <option value="10"> 10 </option>
          <option value="11"> 11 </option>
          <option value="12"> 12 </option>
          <option value="13"> 13 </option>
          <option value="14"> 14 </option>
          <option value="15"> 15 </option>
          <option value="16"> 16 </option>
          <option value="17"> 17 </option>
          <option value="18"> 18 </option>
          <option value="19"> 19 </option>
          <option value="20"> 20 </option>
          <option value="21"> 21 </option>
          <option value="22"> 22 </option>
          <option value="23"> 23 </option>
          <option value="24"> 24 </option>
          <option value="25"> 25 </option>
          <option value="26"> 26 </option>
          <option value="27"> 27 </option>
          <option value="28"> 28 </option>
          <option value="29"> 29 </option>
          <option value="30"> 30 </option>
          <option value="31"> 31 </option>
        </select>

        <select class="custom-select col-md-6" name="mois">
          <option selected>Mois</option>
          <option value="01"> Janvier </option>
          <option value="02"> Février </option>
          <option value="03"> Mars </option>
          <option value="04"> Avril </option>
          <option value="05"> Mai </option>
          <option value="06"> Juin </option>
          <option value="07"> Juillet</option>
          <option value="08"> Août </option>
          <option value="09"> Septembre </option>
          <option value="10"> Octobre </option>
          <option value="11"> Novembre </option>
          <option value="12"> Décembre</option>
        </select>
      </div>

      <br>

    <!--Salle-->
      <div class="form-group">
        <label for="salleLabel">Numéro de Salle: </label>
        <input type="text" class="form-control" id="salleLabel" name="salle">
      </div>

    <!--BOUTON-->
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Valider  </button>
      </div>

    </form>
  </article>
</div> <!-- card.// -->

<style>

body{
  background-color: #11385b;
}

</style>

@endsection