<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metadata extends Model
{
    //



    protected $fillable=["autor","fecha","direccion","estado"];
    protected $table="metadatas";
}
