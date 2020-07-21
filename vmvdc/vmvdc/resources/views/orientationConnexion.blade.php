@extends('layout')
@section('contenu')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<div class="container-fluid">
  <div class="row" style="background-color: #11385b">
    <a href="" style="width: 15%; min-width: 100px">
      <img src="content/ibps-logo.jpg" class="img-fluid float-left" alt="Logo-IBPS">
    </a>
    <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:5%; margin-top: 1%;">
      <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
    </div>
    <!--<div class="col-md-1 d-flex align-content-center flex-wrap">
      <button type="button" class="btn btn-primary">Se connecter</button>
    </div>-->
    <!--<div class="col-md-1 d-flex align-content-center flex-wrap">
      <button type="button" class="btn btn-primary">Se créer un compte</button>
    </div>-->

</div>

<div class="container" style="height:450px; font-family: Georgia, serif; ">


    <br>
    <hr>

    <div class="card bg-light" >
        <article class="card-body mx-auto">
            <h3>Connectez-vous en tant que:</h3>

            <a href={{route('connexionE')}} class="btn btn-secondary row d-flex align-content-center flex-wrap mt-3 mb-3" role="button" aria-pressed="true">Enseignant de lycée </a>
            <a href={{route('connexionD')}} class="btn btn-secondary row d-flex align-content-center flex-wrap mt-3 mb-3" role="button" aria-pressed="true">Doctorant</a>
            <a href={{route('connexionA')}} class="btn btn-secondary row d-flex align-content-center flex-wrap mt-3 mb-3" role="button" aria-pressed="true">Administrateur</a>
        </article>
    </div> <!-- card.// -->
</div>
<!--container end.//-->

<br><br>

<style>
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
