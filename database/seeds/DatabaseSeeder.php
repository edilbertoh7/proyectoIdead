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
    	//Departamentos
    	$this->call(DepartamentosTableSeeder::class);
        //Municipios
        $this->call(MunicipiosTableSeeder::class);
         //CAT de la universidad
        $this->call(CatTableSeeder::class);
    }
}
