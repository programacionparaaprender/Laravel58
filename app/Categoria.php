<?php namespace EditorialWeb;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categorias';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'nombre','padre','estado'];
	//public function propietario()
//	{
//		return $this->belongsTo('GestorImagenes\Usuario');
//	}

/* 
	public function lineas()
	{
		return $this->hasMany('EditorialWeb\Linea');
	}
	public function libroautores()
	{
		return $this->hasMany('EditorialWeb\LibroAutor');
	}
	public function nivel()
	{
		return $this->belongsTo('EditorialWeb\Linea');
	}
	public function genero()
	{
		return $this->belongsTo('EditorialWeb\Genero');
	}
	public function tipoedicion()
	{
		return $this->belongsTo('EditorialWeb\TipoEdicion');
	} */
}
