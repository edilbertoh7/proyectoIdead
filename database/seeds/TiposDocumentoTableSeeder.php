<?php

use Illuminate\Database\Seeder;

class TiposDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documentos')->insert([
        	['abreviacion' => 'CC',    'descripcion' => 'CEDULA DE CIUDADANIA', 	'activo' => '1'],
        	['abreviacion' => 'TI',    'descripcion' => 'TARJETA DE IDENTIDAD', 	'activo' => '1'],
        	['abreviacion' => 'CE',    'descripcion' => 'CEDULA DE EXTRANJERIA', 	'activo' => '1'],
        	['abreviacion' => 'PAS',   'descripcion' => 'PASAPORTE', 				'activo' => '1'],
        	['abreviacion' => 'PEP',   'descripcion' => 'PEP RAMV', 				'activo' => '1'],
        ]);
    }
}
