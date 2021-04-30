<?php

use Illuminate\Database\Seeder;
use App\dat_civile;

class daCivileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $civile=new dat_civile;
        $civile->descripcion="Casado";
        $civile->save();

        $civile=new dat_civile;
        $civile->descripcion="Soltero";
        $civile->save();

        $civile=new dat_civile;
        $civile->descripcion="Viudo";
        $civile->save();
    }
}
