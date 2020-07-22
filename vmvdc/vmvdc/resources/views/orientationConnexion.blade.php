@extends('layout')
@section('contenu')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<div class="container-fluid">

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
