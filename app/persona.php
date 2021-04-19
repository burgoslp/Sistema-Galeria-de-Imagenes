<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\foto;
class persona extends Model
{
    //

    public function user(){

        return $this->hasOne(User::class);
    }

    public function foto(){

        return $this->hasOne(foto::class);
    }

    protected $fillable=["nombre","apellido","cedula"];
    protected $table="personas";
}
