@extends('layout')

@section('contenu')
<div class="content">
    <h1>Connexion</h1>

    <form action={{route('testConnexion')}} method="post">
    {{csrf_field()}}
        <div class="form-group input-group">
        <!--MAIL-->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="emailE" class="form-control" placeholder="Adresse mail" type="email">
            </div> <!-- form-group// -->
        <!--MDP-->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="Mot de passe" type="password" name="mdpE">
            </div> <!-- form-group// -->
        <!--BOUTON-->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Se connecter </button>
            </div>
        </div>
    </form>
</div>
@endsection