<?php

use Illuminate\Database\Seeder;
use App\categoria;
class categoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias=new categoria;
        $categorias->descripcion="Ambiente";
        $categorias->estatus_id=2;//inactivo
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion=2;//inactivo
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion=2;//inactivo
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion=2;//inactivo
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion=2;//inactivo
        $categorias->save();
    }
}
