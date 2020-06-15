<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Administrateurs extends Authenticatable   {

  use Notifiable;

  protected $guard='admins';

  protected $fillable =['nom','prenom','email', 'mot_de_passe'];

  protected $hidden = ['mot_de_passe'];


}
