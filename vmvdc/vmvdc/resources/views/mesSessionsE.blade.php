@extends ('layout')

@section('contenu')

<div class="contenu" style="background: url(content/bandeau-ibps.jpg) fixed no-repeat top; background-size: 100%;">
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

<div class=container>
  <div class="shadow-lg p-3 mb-5 bg-blue rounded" style="background-color: #B0C4DE;">
    <br>
    <div class="col-md text-center text-wrap text-break content_center" style="font-style: oblique; font-family: Georgia, serif;">
      <h3> Vos informations </h3>
    </div>
      <button type="button" class="btn btn-xs btn-secondary" style="margin-left:400px; margin-top:0px">S'inscrire à une nouvelle session</button>
      <input type="file" name="fichier"/>
  </div>
</div>


<style>
  .container{
    font-style: oblique;
    font-family: Georgia, serif;

  }
</style>

@endsection
