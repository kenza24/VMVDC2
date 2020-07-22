<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vis ma vie de chercheur</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="css/style.css" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        <!-- En-tete -->
        <div class="container-fluid">
        <div class="row" style="background-color: #11385b">
            <a href={{'accueil'}} style="width: 15%; min-width: 100px">
            <img src="content/ibps-logo.jpg" class="img-fluid float-left" alt="Logo-IBPS">
            </a>
            <div class="col-md text-center text-wrap text-break content_center" style="color: white; height:5%; margin-top: 1%;">
            <h1 style="vertical-align: middle;">Vis ma vie de chercheur</h1>
            </div>
            <?php if(!isset($_SESSION['connecte'])): ?>
                <a href={{route('orientationConnexion')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap text-break text-wrap" role="button" aria-pressed="true">Se connecter</a>
                <a href={{route('inscriptione')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap text-break text-wrap" role="button" aria-pressed="true">Se créer un compte</a>
            <?php else: ?>
                <a href={{route('deconnexione')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap text-break text-wrap" role="button" aria-pressed="true">Se déconnecter</a>
                <a href={{route('retourProfil')}} class="btn btn-primary col-md-1 d-flex align-content-center flex-wrap text-break text-wrap" role="button" aria-pressed="true">Retourner à mon profil</a>
            <?php endif; ?>
        </div>
        </div>

            <div class="content" style="background-color: #274D71;">

                @yield ('contenu')

            </div>
        </div>
    </body>
</html>
