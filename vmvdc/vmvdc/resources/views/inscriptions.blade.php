
@extends('layout')

@section('contenu')
  <form action="/inscriptions"  method="post">
  {{ csrf_field() }}
    
    <input type="email" name ="email" placeholder="Email">

    <input type="password" name ="password" placeholder="Mot de passe">
    <input type="password" name ="mdp_confirmation" placeholder="Mot de passe (confirmation)">
    <input type="submit" name ="M'inscrire">
  </form>

  @endsection
