<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Enseignants extends Authenticatable   {

  use Notifiable; //utiliser les 6 methode par defaut

  protected $guard='enseignants';

  protected $fillable =['nom','prenom','email', 'mot_de_passe'];
  protected $hidden = ['mot_de_passe'];


}
