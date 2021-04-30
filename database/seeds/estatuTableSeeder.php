<?php

use Illuminate\Database\Seeder;
use App\estatu;
class estatuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $estatu= new estatu;
        $estatu->descripcion="Activo";
        $estatu->save();

        $estatu= new estatu;
        $estatu->descripcion="Inactivo";
        $estatu->save();
    }
}
