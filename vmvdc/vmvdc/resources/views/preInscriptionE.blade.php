@extends('layout')
@section('contenu')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<body>
<div class="contenu" style="background: url(content/bandeau-ibps.jpg) fixed no-repeat top; background-size: 100%;">
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
<div class="container" action="/inscriptionsA">

<br>
<hr>


<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Pré inscrivez votre classe !</h4>


	<p class="divider-text">

        <span class="bg-light"></span>
    </p>
	<form action="/preInscriptionE" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{csrf_field()}}


	<div class="form-group input-group" style="background-color:#B0C4DE">




  <!--NOM/PRENOM-->
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nom" class="form-control" placeholder="Nom" type="text">
        <input name="prenom" class="form-control" placeholder="Prenom" type="text">
    </div> <!-- form-group// -->




    <!--Nom etablissement-->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Etablissement scolaire" type="text" name="etablissementScolaire">
    </div> <!-- form-group// -->

    <!--VILLE-->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Ville" type="text" name="ville">
    </div>

    <!--Code postal-->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
        <input class="form-control" placeholder="Code postal" type="text" name="codePostal">
    </div>

    <!--NIVEAU SCOLAIRE -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
        <input class="form-control" placeholder="Niveau scolaire de votre classe" type="text" name="niveau">
    </div>

    <!-- REP -->
    <label> REP ? </label>
    <div>
      <input type="radio" id="huey" name="drone" value="huey"
           checked>
    <label for="oui">Oui</label>
  </div>

  <div>
    <input type="radio" id="dewey" name="drone" value="dewey">
    <label for="non">Non</label>
  </div>

    <!--BOUTON-->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Valider  </button>
    </div>

    <p class="text-center">Deja inscrit ? <a href="">Connectez-vous !</a> </p>
</form>
</article>
</div> <!-- card.// -->

<style>
</body>

body{
  background-color: black;
}


</style>

@endsection
