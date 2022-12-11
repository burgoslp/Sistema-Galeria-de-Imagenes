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

        return $this->hasMany(foto::class);
    }

    protected $fillable=["nombre","apellido","cedula",'dat_civile_id','dat_sexo_id','correo'];
    protected $table="personas";
}
