<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $table = "universidades";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'lema', 'escudo', 'pagina', 'direccion', 'ciudad_id', 'latitud', 'longitud'
    ];


    public function ciudad(){
        return $this->belongsTo('App\Ubicacion');
    }

    public function habitaciones(){
        return $this->belongsToMany('App\Habitacion')->withTimestamps();
    }

    public function scopeSearch($query,$nombre){
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
