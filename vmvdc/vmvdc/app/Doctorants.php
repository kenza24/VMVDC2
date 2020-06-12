<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Doctorants extends Model implements Authenticatable {

  use BasicAuthenticatable; //utiliser les 6 methode par defaut

  public function getAuthPassword(){
    return $this->mot_de_passe;
  }
}
