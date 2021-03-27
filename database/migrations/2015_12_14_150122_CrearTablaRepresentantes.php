<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRepresentantes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('representantes', function(Blueprint $table)
		{
			$table->increments('id');
			
                        $table->String('cedula');
			$table->String('nombre');
			$table->String('apellido');
			$table->text('direccion');
			$table->String('telefono');
			$table->String('rif');
			$table->String('email');
			$table->String('password', 60);
			$table->string('pregunta');
			$table->string('respuesta');
			$table->integer('idnivel')->unsigned();
			$table->String('nombreEscuela');
                        $table->integer('admin')->unsigned()->default('0');
			$table->rememberToken();
			//$table->primary('id');
			$table->foreign('idnivel')->references('id')->on('niveles');
			$table->timestamps(4);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('representantes');
	}

}
