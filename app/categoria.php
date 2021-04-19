<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\foto;
class categoria extends Model
{
    //

    public function fotos(){

        return $this->belongsToMany(foto::class)->withTimestamps();
    }

    protected $fillable=["descripcion"];
    protected $table="categorias";
}
