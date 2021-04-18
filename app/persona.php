<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    //



    protected $fillable=["nombre","apellido","cedula"];
    protected $table="personas";
}
