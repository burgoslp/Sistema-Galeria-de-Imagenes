<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\colecione;
use App\foto;
use App\direccion;
use App\telefono;
use App\social;
use App\logo;
use App\categoria;
class estatu extends Model
{
    //

    public function colecciones(){

        return $this->hasMany(coleccione::class);
    }

    public function fotos(){

        return $this->hasMany(foto::class);

    }
    public function logos(){

        return $this->hasMany(logo::class);

    }
    public function direcciones(){

        return $this->hasMany(direccion::class);

    }
    public function telefonos(){

        return $this->hasMany(telefono::class);

    }
    public function sociales(){

        return $this->hasMany(social::class);

    }
    public function categorias(){

        return $this->hasMany(categoria::class);

    }
    protected $fillable=["descripcion"];
    protected $table="estatus";
}
