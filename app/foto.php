<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\categoria;
use App\coleccione;
use App\metadata;
class foto extends Model
{
    //

    public function categorias(){

        return $this->belongsToMany(categoria::class)->withTimestamps();
    }

    public function coleccion(){

        return $this->belongsTo(coleccione::class)
    }

    public function metadata(){

        return $this->belongsTo(metadata::class);
    }

    protected $fillable=["ruta"];
    protected $table="fotos";
}
