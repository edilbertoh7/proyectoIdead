<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->increments('id')->comment('Código del CAT');

            $table->string('nombre',50)->comment('Nombre del CAT');

            $table->text('direccion')->comment('Direccion del CAT');

            $table->string('email',50)->dafault('')->comment('Email contacto del CAT');

            $table->unsignedInteger('departamento_id')->comment('Código del departamento al que pertenece');

            $table->unsignedInteger('municipio_id')->comment('Código del municipio al que pertenece');   

            $table->boolean('activo')->default(1)->comment('Activo'); 

            $table->timestamps();

            //laves foraneas

           $table->foreign('departamento_id')->references('id')->on('departamentos');
           $table->foreign('municipio_id')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cats');
    }
}
