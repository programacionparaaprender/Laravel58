<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaNiveles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('niveles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('descripcion');
			//$table->primary('id');
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
		Schema::drop('niveles');
	}

}
