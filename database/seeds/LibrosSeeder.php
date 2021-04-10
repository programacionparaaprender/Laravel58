<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use EditorialWeb\Libro;

class LibrosSeeder extends Seeder 
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Libro::create(['nombre'=>'Algoritmo',                         'descripcion'=>'Trata logaritmos de un número como propiedades, operaciones, y ejercicios','cantidad'=>'100','ruta'=>'img/text.png','precio'=>'500']);
		Libro::create(['nombre'=>'Charlie y la Fábrica de Chocolate', 'descripcion'=>'Por primera vez en una década, Willy Wonka, el solitario y excéntrico',    'cantidad'=>'100','ruta'=>'img/text.png','precio'=>'500']); 
		
		/* Libro::create(['nombre'=>'Algoritmo',                      'año'=>'2010-01-01','idgenero'=>'11','idtipoed'=>'23','cantpaginas'=>'329','edicion'=>'1','idnivel'=>'12','descripcion'=>'Trata logaritmos de un número como propiedades, operaciones, y ejercicios','cantidad'=>'100','ruta'=>'img/text.png','precio'=>'500']);
		Libro::create(['nombre'=>'Charlie y la Fábrica de Chocolate', 'año'=>'2010-01-01','idgenero'=>'5', 'idtipoed'=>'23','cantpaginas'=>'329','edicion'=>'1','idnivel'=> '2','descripcion'=>'Por primera vez en una década, Willy Wonka, el solitario y excéntrico','cantidad'=>'100','ruta'=>'img/text.png','precio'=>'500']); 
		Libro::create(['nombre'=>'Cuentos para Jugar',             'año'=>'2010-01-01','idgenero'=>'5', 'idtipoed'=>'23','cantpaginas'=>'329','edicion'=>'1','idnivel'=> '2','descripcion'=>'Esta obra recoge veinte cuentos cuyos desenlaces quedan abiertos a tres ','cantidad'=>'100','ruta'=>'img/text.png','precio'=>'500']); 
		Libro::create(['nombre'=>'El Origen del Universo',         'año'=>'2012-01-01','idgenero'=>'5', 'idtipoed'=>'23','cantpaginas'=>'329','edicion'=>'1','idnivel'=> '2','descripcion'=>'El mayor experimento científico de la Historia está en marcha? ¡y George','cantidad'=>'100','ruta'=>'img/text.png','precio'=>'500']); */
                //factory(Libro::class)->times(100)->create();
	}
}