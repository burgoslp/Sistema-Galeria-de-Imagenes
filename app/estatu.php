<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\colecione;
use App\foto;
class estatu extends Model
{
    //

    public function colecciones(){

        return $this->hasMany(coleccione::class);
    }

    public function fotos(){

        return $this->hasMany(foto::class);

    }
    protected $fillable=["descripcion"];
    protected $table="estatus";
}
