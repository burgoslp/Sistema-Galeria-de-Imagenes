<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\categoria;
use App\coleccione;
use App\metadata;
use App\persona;
use Illuminate\Database\Eloquent\SoftDeletes;
class foto extends Model
{
    //
    use SoftDeletes;
    public function categorias(){

        return $this->belongsTo(categoria::class)->withTimestamps();
    }

    public function coleccion(){

        return $this->belongsTo(coleccione::class);
    }

    public function fotografo(){

        return $this->belongsTo(persona::class);
    }

    
    protected $fillable=["persona_id","coleccione_id","estatu_id","categoria_id","seccion_id","author","descripcion","locacion","fecha","url"];
    protected $table="fotos";
}
