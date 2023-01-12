<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class social extends Model
{
    //
    public function user(){

        return $this->belongsTo(User::class);
    }
    protected $fillable=['user_id','estatu_id',"descripcion","empresa"];
    protected $table="sociales";
}
