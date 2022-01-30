<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id')->comment('Código del detalle del usuario');

            $table->unsignedInteger('user_id')->default('1')->comment('Código de Usuario');

            $table->unsignedInteger('tipo_documento_id')->default('1')->comment('Código del tipo de documento');

            $table->string('numero_documento',25)->comment('Numero de documento');

            $table->string('primer_nombre',50)->comment('Primer Nnmbre');

            $table->string('segundo_nombre',50)->nullable()->comment('Segundo nombre');

            $table->string('primer_apellido',50)->comment('Primer apellido');

            $table->string('segundo_apellido',50)->nullable()->comment('Segundo apellido');     

            $table->timestamps();

            //Llaves foraneas
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
