<?php

use Illuminate\Database\Seeder;
use App\User;
use App\role;
class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user= new User;
        $user->name="Administrador";
        $user->email="administrador@gmail.com";
        $user->password=bcrypt('Admin1234');
        $user->save();
        $user->roles()->attach(Role::where('nombre', 'admin')->first());
        

        $user= new User;
        $user->name="Operador";
        $user->email="operadorUltimasnoticias@gmail.com";
        $user->password=bcrypt('Operador1234');
        $user->save();
        $user->roles()->attach(Role::where('nombre', 'operador')->first());
        
    }
}
