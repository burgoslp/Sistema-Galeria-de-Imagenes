<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //



    protected $fillable=["nombre","descripcion"];
    protected $table="roles";
}
