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
      <form action={{route('deconnexiond')}}>
       <button type="submit" class="btn btn-primary btn-block">Se déconnecter</button>
     </form>
    </div>
  </div>
</div>
  <br>
  <br>
  <br>
  <div class="col-md text-center text-wrap text-break content_center" style="color: white;font-style: oblique; font-family: Georgia, serif;">
    <h1><?= $data[0]->nom ?>
    </h1>
  </div>

  <div  class="container">
    <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;">
      <br>
      <div class="col-md text-center text-wrap text-break content_center" style="font-style: oblique; font-family: Georgia, serif;">
        <h3> Vos informations </h3>
      </div>
      <br>
      <br>

    <!--<dl class="row">-->
        <div class="shadow-lg p-3 mb-5 bg-black rounded" style="width: 1000px; margin-left:55px">
          <div class="row align-items-center">
          <div class="col-4">
            <dt class="col-xl-5" style="margin-left:30px;">Votre email : <?= $data[0]->email ?></dt>
          </div>
          <div class="col-4">
            <dt class="col-xl-5" style="margin-left:30px;">Votre nom : <?= $data[0]->nom ?></dt>
          </div>
          <div class="col-4">
            <dt class="col-xl-5" style="margin-left:30px;">Votre prénom : <?= $data[0]->prenom ?></dt>
          </div>
        </div>


        </div>
      <!--</dl>-->



      <div class="d-flex flex-row">


      <div class="p-2">
        <button type="button" class="btn btn-xs btn-secondary" style="margin-left:400px; margin-top:0px">Modifier mes informations</button>
      </div>
      </div>
    </div>
<!--Fin container-->
</div>


  <div class="container">
    <div class="shadow-lg p-3 mb-5 bg-black rounded" style="background-color:#B0C4DE;">

      <div class="col-md-4" style=" display: inline-block;">
        <div class="d-flex flex-row">
        <div class="p-2">
        <div class="card" style="border: none; border-radius: 0; background-color: #f5f5f5; margin:0;">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" style="width:250px;">
               <strong class="d-inline-block mb-2 text-secondary">Mes sessions</strong>
               <h6 class="mb-0">
                  Vous pouvez retrouver un récapitulatif de vos sessions a venir !
               </h6>
               <br>
               <br>
               <br>
               <a class="btn btn-outline-secondary btn-sm" role="button" href="sessions">Y aller !</a>
            </div>
          </div>
         </div>
       </div>

          <div class="p-2">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
              <div class="card-body d-flex flex-column align-items-start" style="margin-left:1px; width:650px; height: 255px">
                <strong class="d-inline-block mb-2 text-secondary">Mes documents</strong>
                 <h6 class="mb-0">

                 </h6>
               </div>
              </div>
            </div>

           </div>

      </div>
    </div>
  </div>





  <!--Pied de page-->
    <div class="container-fluid mt-5" style="background-color: #11385b;">
      <br>
        <br>
          <div class="row d-flex justify-content-around">
            <a href="">Nous contacter</a>
            <a href="">A propos</a>
            <a href="">Qui sommes-nous ?</a>
          </div>
        <br>
      <br>
    </div>


    <style>
      .container{
        font-style: oblique;
        font-family: Georgia, serif;

      }
    </style>
@endsection
