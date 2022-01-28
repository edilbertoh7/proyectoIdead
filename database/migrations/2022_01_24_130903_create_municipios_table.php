<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id')->comment('Código del municipios');
            $table->unsignedInteger('departamento_id')->comment('Código del departamento al que pertence');
            $table->string('codigo_divipola',3)->comment('Código divipola del municipio');
            $table->string('nombre',30)->comment('Nombre del municipio');
            $table->timestamps();

            // laves foraneas
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
