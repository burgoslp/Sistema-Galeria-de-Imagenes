<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class telefono extends Model
{
    //
    public function user(){

        return $this->belongsTo(User::class);
    }
    protected $fillable=["user_id","estatu_id","descripcion"];
    protected $table="telefonos";
}
