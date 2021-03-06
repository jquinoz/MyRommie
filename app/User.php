<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password','apellido','numId','tipo_id','genero','tipo_usuario','token','activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','numId','token','activated'
    ];

    public function habitaciones(){
        return $this->hasMany('App\Habitacion');
    }

    public function ofertas(){
        return $this->hasMany('App\Oferta');
    }

    public function caracteristicas(){
        return $this->belongsToMany('App\Caracteristica')->withTimestamps();
    }

    public function isAdmin(){
        return $this->tipo_usuario === 'admin';
    }

    public function isArrendador(){
        return $this->tipo_usuario === 'arrendador';
    }

    public function activeAccount(){
        return $this->activated;
    }

    public function scopeSearchUser($query,$email){
      return $query->where('email','LIKE',"%$email%")->get();
    }

    public function alreadyOfer($habitacion){
      foreach ($this->ofertas as $oferta){
        if ($oferta->habitacion->id == $habitacion) {
          return true;
        }
      }
      return false;
    }

}
