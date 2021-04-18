<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coleccione extends Model
{
    //


    protected $fillable=["nombre","descripcion","fecha"];
    protected $table="colecciones";
}
