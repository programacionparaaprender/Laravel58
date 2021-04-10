<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use EditorialWeb\Categoria;

class CategoriaSeeder extends Seeder 
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Categoria::create(['nombre'=>'No definido', 'padre'=> 0, 'estado'=> 1]);
	
    }
}