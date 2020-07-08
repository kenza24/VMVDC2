@extends('layout')
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
      <form action={{route('deconnexione')}}>
       <button type="submit" class="btn btn-primary btn-block">Se déconnecter</button>
     </form>
    </div>
  </div>
</div>
<body>


  <div class="container">
  <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;">
    <div class="col-md text-center text-wrap text-break mt-5 mb-3" style="font-style: oblique; font-family: Georgia, serif;">
      <h2> Session du "date"<h2>

      <!--<div class="container mt-1" style="background-color:white;">
        <br>
        <br>
        <div class="col-md-4 mb-2 mt-2" style ="font-size: 20px; text-align:center;">
          <h5>Enseignant : </h5>
        </div>
        <br>
        <div class="col-md-4 mb-1 mt-1" style ="font-size: 20px;">
          <h5>Adresse mail : </h5>
        </div>
        <br>
        <div class="col-md-4 mb-1 mt-1" style ="font-size: 20px;">
          <h5>Lieu de rendez-vous : </h5>
        </div>
        <br>
        <div class="col-md-4 mb-1 mt-1" style ="font-size: 20px;">
          <h5>Nombre d'élèves : </h5>
        </div>
        @csrf_field-->
        <br>
        <table class="table table-striped table-responsive-xl">
          <thead style="font-size:25px;">
            <tr>
              <th scope="col">Enseignant</th>
              <th scope="col">E-mail</th>
              <th scope="col">Nombre d'élèves</th>
              <th scope="col">Lieu de rendez-vous</th>
            </tr>
          </thead>
          <tbody>
              <tr style="font-size:20px;">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>

        </table>
        <form action="detailSessionD" enctype= "multipart/form-data" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          {{csrf_field()}}
          <br>
          <div style ="font-size: 20px;">
            <h5>Choisissez un document de présentation : </h5>
          </div>
           <input type="file" name="fichierD" style="font-size:17px; padding-top:10px"/>

           <br>
           <br>

            <div style ="font-size: 20px;">
              <label style="text-align:top;">Informations complémentaires : </label>
            </div>

              <textarea name="details" class="md-textarea form-control" rows="5" style="width:500px; margin:auto;"></textarea>

          </div>



        <!--BOUTON-->
        <button type="submit" class="btn btn-secondary btn-block" style="width:100px; margin:auto;"> Valider  </button>

      </form>


      </div>
  </div>


</body>
<div class="container-fluid mt-5" style="background-color: #11385b;">
  <br>
    <br>
      <div class="row d-flex justify-content-around">
        <a href="">A propos</a>
        <a href="">Qui sommes-nous ?</a>
      </div>
    <br>
  <br>
</div>
</div>

</div>



<style>

<style>
  .container{
    font-style: oblique;
    font-family: Georgia, serif;


  }
</style>



</style>

@endsection
