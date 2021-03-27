<?php

namespace EditorialWeb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Elocuent\softDeletes;


class Post extends Model
{
    		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    //const CREATED_AT = 'fecha_creacion';
    //const UPDATED_AT = 'fecha_actualizacion';

	//protected $fillable = ['id', 'titulo', 'contenido','id_autor','fecha_creacion','fecha_actualizacion','fecha_borrado'];
    protected $primaryKey = 'id'; 
    

	
	protected $fillable = ['id', 'titulo', 'contenido','id_autor','estado'];
	//protected $dateFormat = 'Ymd H:i:s';

    //use SoftDeletes;
	//protected $softDelete = true;
	//protected $date = ['fecha_borrado']; 

	//public function propietario()
//	{
//		return $this->belongsTo('GestorImagenes\Usuario');
//	}
	/* public function libros()
	{
		return $this->hasMany('EditorialWeb\Libro');
    } */
    public function autor()
	{
		return $this->belongsTo('EditorialWeb\User', 'id_autor');
	}
}
