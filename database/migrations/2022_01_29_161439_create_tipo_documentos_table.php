<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->increments('id')->comment('Código del tipo de documento');

            $table->string('abreviacion',3)->comment('Abreviación del tipo de documento');

            $table->string('descripcion',50)->comment('Descripción');

            $table->boolean('activo')->default(1)->comment('Activo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_documentos');
    }
}
