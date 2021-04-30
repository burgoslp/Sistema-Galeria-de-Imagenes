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
        $categorias->descripcion="Deportes";
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion="Belico";
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion="Economia";
        $categorias->save();

        $categorias=new categoria;
        $categorias->descripcion="Urbano";
        $categorias->save();
    }
}
