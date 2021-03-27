<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPedidos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idusers')->unsigned();
//			$table->timestamp('fecha-hora');
			$table->double('total');
			$table->integer('idestado')->unsigned();
                        //$table->primary('id');
			$table->foreign('idusers')->references('id')->on('users');
                        $table->foreign('idestado')->references('id')->on('estadopedidos');
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
		Schema::drop('pedidos');
	}

}
