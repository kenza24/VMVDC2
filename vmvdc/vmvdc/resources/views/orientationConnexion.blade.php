@extends('layout')
@section('contenu')

<div class="container" style="font-family: Georgia, serif; ">

    <br>
    <hr>

    <div class="card bg-light" >
        <article class="card-body container d-flex flex-column flex-wrap">
            <div class="d-flex justify-content-md-center text-break text-wrap flex-wrap">
                <h3 class="d-flex flex-wrap">Connectez-vous en tant que:</h3>
            </div>
            <div class="d-flex justify-content-md-center text-break text-wrap flex-wrap">
                <a href={{route('connexionE')}} class="btn btn-secondary d-flex flex-wrap mt-3 mb-3 text-break text-wrap col-12 px-md" role="button" aria-pressed="true" style="max-width: 20em">Enseignant de lycée </a>
            </div>
            <div class="d-flex justify-content-md-center text-break text-wrap flex-wrap">
                <a href={{route('connexionD')}} class="btn btn-secondary d-flex flex-wrap mt-3 mb-3 text-break text-wrap col-12 px-md" role="button" aria-pressed="true" style="max-width: 20em">Doctorant</a>
            </div>
            <div class="d-flex justify-content-md-center text-break text-wrap flex-wrap">
                <a href={{route('connexionA')}} class="btn btn-secondary d-flex flex-wrap mt-3 mb-3 text-break text-wrap col-12 px-md" role="button" aria-pressed="true" style="max-width: 20em">Administrateur</a>
            </div>
        </article>
    </div> <!-- card.// -->
</div>
<!--container end.//-->

<br><br>


@endsection
