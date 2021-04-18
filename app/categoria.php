<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    //


    protected $fillable=["descripcion"];
    protected $table="categorias";
}
