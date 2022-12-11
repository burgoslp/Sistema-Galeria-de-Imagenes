<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);

        $this->call(estatuTableSeeder::class);

        $this->call(daCivileTableSeeder::class);
        
        $this->call(datSexoTableSeeder::class);

        $this->call(roleTableSeeder::class);

        $this->call(categoriaTableSeeder::class);
        
        $this->call(usersTableSeeder::class);

    }
}
