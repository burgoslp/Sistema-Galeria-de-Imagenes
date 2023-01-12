<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\role;
use App\persona;
use App\direccion;
use App\telefono;
use App\social;
use App\logo;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles(){

        return $this->belongsToMany(role::class)->withTimestamps();
    }


    public function persona(){

        return $this->belongsTo(persona::class);
    }
    public function direcciones(){

        return $this->hasMany(direccion::class);
    }
    public function telefonos(){

        return $this->hasMany(telefono::class);
    }
    public function sociales(){

        return $this->hasMany(sociales::class);
    }
    public function logos(){

        return $this->hasMany(logos::class);
    }



    /*FUNCIONES PARA EL MANEJO DE LOS ROLES*/

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('nombre', $role)->first()) {
            return true;
        }
        return false;
    }
}
