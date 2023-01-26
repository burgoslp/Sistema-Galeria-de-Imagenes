<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\foto;
class categoria extends Model
{
    //

    public function fotos(){

        return $this->hasMany(foto::class);
    }

    protected $fillable=["estatu_id","descripcion"];
    protected $table="categorias";
}
