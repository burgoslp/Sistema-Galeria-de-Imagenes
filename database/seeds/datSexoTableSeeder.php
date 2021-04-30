<?php

use Illuminate\Database\Seeder;
use App\dat_sexo;
class datSexoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $sexos=new dat_sexo;
        $sexos->descripcion="Hombre";
        $sexos->save();

        $sexos=new dat_sexo;
        $sexos->descripcion="Mujer";
        $sexos->save();

    }
}
