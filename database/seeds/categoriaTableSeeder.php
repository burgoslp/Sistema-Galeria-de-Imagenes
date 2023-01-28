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
        $categorias->estatu_id=2;//inactivo
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion="Belico";
        $categorias->estatu_id=2;//inactivo
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion="Ciudad";
        $categorias->estatu_id=2;//inactivo
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion="Popular";
        $categorias->estatu_id=2;//inactivo
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion="Gobierno";
        $categorias->estatu_id=2;//inactivo
        $categorias->save();
    }
}
