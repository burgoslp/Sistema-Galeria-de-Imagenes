<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\foto;
class metadata extends Model
{
    //

    public function persona(){

        return $this->hasOne(foto::class);
    }

    protected $fillable=["autor","fecha","direccion","estado"];
    protected $table="metadatas";
}
