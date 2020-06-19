@extends ('layout')

@section('contenu')


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container">

    <br>
    <hr>

    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Connectez-vous</h4>

            <p class="divider-text">
                <span class="bg-light"></span>
            </p>
            <form action={{route('connexionD')}} method="post">
                {{csrf_field()}}
                <div class="form-group input-group">

                <!--MAIL-->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <input name="emailE" class="form-control" placeholder="Adresse mail" type="email">
                    </div>

                <!--MDP-->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <input class="form-control" placeholder="Mot de passe" type="password" name="mdpE">
                    </div>

                <!--BOUTON-->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                    </div>
                </div>
            </form>
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
