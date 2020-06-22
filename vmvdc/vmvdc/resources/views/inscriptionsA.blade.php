@extends ('layout')

@section('contenu')

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

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">



<div class="container" action="/inscriptionsA">

<br>
<hr>


<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Inscrivez un administrateur</h4>


	<p class="divider-text">

        <span class="bg-light"></span>
    </p>
	<form action="/inscriptionsA" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{csrf_field()}}


	<div class="form-group input-group">

  <!--NOM/PRENOM-->
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nomA" class="form-control" placeholder="Nom" type="text">
        <input name="prenomA" class="form-control" placeholder="Prenom" type="text">
    </div> <!-- form-group// -->


    <!--MAIL-->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		  </div>
      <input name="emailA" class="form-control" placeholder="Adresse mail" type="email">
    </div> <!-- form-group// -->


    <!--MDP-->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Mot de passe" type="password" name="mdpA">
    </div> <!-- form-group// -->

    <!--VERIF MDP-->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Confimer le mot de passe" type="passwordA">
    </div> <!-- form-group// -->

    <!--BOUTON-->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Valider  </button>
    </div>

    <p class="text-center">Deja inscrit ? <a href="">Connectez-vous !</a> </p>
</form>
</article>
</div> <!-- card.// -->

</div>
<!--container end.//-->

<br><br>

<style>

body{
	background-image:url(content/téléchargement.jpeg);;
}
.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
}
</style>

@endsection
