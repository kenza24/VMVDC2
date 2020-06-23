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
<div class="container" action="/preInscriptionE">

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


	<div class="form-group input-group" >


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

    <!--Effectif de la classe-->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> </span>
    </div>
        <input class="form-control" placeholder="Effectif de la classe" type="text" name="effectifClasse">
    </div>

    <!-- REP -->

    <label> Zone prioritaire ? </label>
    <div style="display: inline-block;">

      <input type="radio"  name="rep" value="1"
           checked style="margin-left:10px;">
    <label for="oui">Oui</label>

    <input type="radio" name="rep" value="0" style="margin-left:5px;"  >
    <label for="non">Non</label>

</div>

<!--académie -->
<div class="form-group input-group">
    <label> Académie :  </label>
    <div>

    <input type="radio"  name="academie" value="creteil" checked style="margin-left:10px;">
    <label for="creteil">Créteil</label>

    <input type="radio" name="academie" value="versailles" style="margin-left:5px;">
    <label for="versailles">Versailles</label>

    <input type="radio" name="academie" value="paris" style="margin-left:5px;">
    <label for="paris">Paris</label>

</div>
</div>

<div class="form-group">
                  <label for="selection">Choisissez deux dates</label>
                  <select id="selection" class="form-control" style="display:inline-block;"
                   onclick="this.form.texte.value=this.options[this.selectedIndex].text;" name="date1" value="date 1">
                    <optgroup label="Mai">
                      <option value="mettre date">date 1</option>
                      <option value="date 1">date 2</option>
                      <option value="date 1">date 3</option>
                    </optgroup>
                    <optgroup label="Juin">
                      <option value="22/06">22/06</option>
                      <option value="option 5">Option 5</option>
                    </optgroup>
                  </select>

                  <br>

                  <select id="selection" class="form-control" style="display:inline-block;"
                   onclick="this.form.texte.value=this.options[this.selectedIndex].text;" name="date2" value="date 2">
                    <optgroup label="Mai">
                      <option value="date 2">date 1</option>
                      <option value="date 2">date 2</option>
                      <option value="date 2">date 3</option>
                    </optgroup>
                    <optgroup label="Juin">
                      <option value="date 2">Option 4</option>
                      <option value="date 2">Option 5</option>
                    </optgroup>
                  </select>
                </div>

<!-- CHOIX DES DATES -->
<!--<div class="form-group input-group">
  <div class="input-group-prepend">
    <label> Choix d'une date : </label>
<select name="dates">
  <option value="date1"> 22/06 </option>
  <option value="date1"> 26/06 </option>
</select>

<label> Choix d'une deuxieme date : </label>
<select name="dates">
<option value="date2"> 22/06 </option>
<option value="date2"> 26/06 </option>
</select>
</div>-->

<!-- CHOIX DATES -->
<!--<div>
<form>
<input name="texte"  type="TEXT" name="date1"/>
<select onclick="this.form.texte.value=this.options[this.selectedIndex].text;" name="date1">
  <option>22/06</option>
  <option>26/06</option>
  <option>30/06</option>
  </select>
</form>
</div>

<div>
<form>
<input name="texte2" type="TEXT" name="date2"/>
<select onclick="this.form.texte2.value=this.options[this.selectedIndex].text;" name="date2">
  <option>22/06</option>
  <option>26/06</option>
  <option>30/06</option>
</select>
</form>
</div>
-->
    <!--BOUTON-->
    <button type="submit" class="btn btn-secondary btn-block"> Valider  </button>


</form>

</article>
</div>

<style>


  .container{
    font-style: oblique;
    font-family: Georgia, serif;


}


</style>

@endsection
