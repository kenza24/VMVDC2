@extends('layout')
@section('contenu')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <div class="container" action="/preInscriptionE">

  <br>
  <hr>


  <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
	    <h4 class="card-title mt-3 text-center">Pré inscrivez votre classe !</h4>
      <p class="divider-text">
        <span class="bg-light"></span>
      </p>
      <form action={{'preInscriptionE'}} method="post">
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

        <!--Nom de la classe-->
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
          </div>
          <input class="form-control" placeholder="Nom de la classe" type="text" name="nomClasse">
        </div>

        <!--Effectif de la classe-->
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> </span>
          </div>
          <input class="form-control" placeholder="Effectif de la classe" type="text" name="effectifClasse">
        </div>

        <!--Nombre d'accompagnateur-->
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> </span>
          </div>
          <input class="form-control" placeholder="Nombre d'accompagnateurs" type="text" name="nbAccompagnateurs">
        </div>

        <!--NIVEAU SCOLAIRE -->
        <div class="form-group">
          <label for="selection">Niveau de votre classe</label>
          <select id="selection" class="form-control" style="display:inline-block;" onclick="this.form.texte.value=this.options[this.selectedIndex].text;" name="niveau" value="niveau">

            <option value=premiere>Première </option>
            <option value=terminale>Terminal </option>

          </select>
        </div>
        <!-- REP -->

        <label> Zone prioritaire ? </label>
        <div style="display: inline-block;">
          <input type="radio"  name="rep" value="REP" checked style="margin-left:10px;">
          <label for="oui">Oui</label>

          <input type="radio" name="rep" value="PAS REP" style="margin-left:5px;"  >
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

        <!-- Dates -->
        <div class="form-group">
          <label for="selection">Sélectionnez des dates selon votre disponibilité (3 maximum) :</label>
          <select id="selection" class="form-control" style="display:inline-block;"
            onclick="this.form.texte.value=this.options[this.selectedIndex].text;" name="date1" value="date 1">
            <option value=" "> -- </option>
            <?php foreach($dates as $keyDates => $date):?>
                <option value=<?= $keyDates ?>><?=$date?></option>
            <?php endforeach;?>
          </select>

          <br>

          <select id="selection" class="form-control" style="display:inline-block;"
            onclick="this.form.texte.value=this.options[this.selectedIndex].text;" name="date2" value="date 2">
            <option value=" "> -- </option>
            <?php foreach($dates as $keyDates => $date):?>
                <option value=<?= $keyDates ?>><?=$date?></option>
            <?php endforeach;?>
          </select>

          <select id="selection" class="form-control" style="display:inline-block;"
            onclick="this.form.texte.value=this.options[this.selectedIndex].text;" name="date3" value="date 3">
            <option value=" "> -- </option>
            <?php foreach($dates as $keyDates => $date):?>
                <option value=<?= $keyDates ?>><?=$date?></option>
            <?php endforeach;?>
          </select>
        </div>

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
