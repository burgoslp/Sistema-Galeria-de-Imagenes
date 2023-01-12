<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class logo extends Model
{
    //
    public function user(){

        return $this->belongsTo(User::class);
    }
    protected $fillable=['user_id','estatu_id',"url"];
    protected $table="logos";
}
