<?php

use Illuminate\Database\Seeder;
use App\role;
class roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /*
            $role=new role;
            $role->nombre="User";
            $role->descripcion="Rol de los fotografos";
            $role->save();
        */

        $role=new role;
        $role->nombre="Operador";
        $role->descripcion="Rol del operador encargado en subir las fotos";
        $role->save();

        $role=new role;
        $role->nombre="Admin";
        $role->descripcion="Rol del administrador del sistema";
        $role->save();
    }
}
