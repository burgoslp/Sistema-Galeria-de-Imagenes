<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class role extends Model
{
    //

    public function users(){

        return $this->belongsToMany(User::class)->withTimestamps();
    }

    protected $fillable=["nombre","descripcion"];
    protected $table="roles";
}
