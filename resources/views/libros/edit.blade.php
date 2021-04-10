@extends('app')

@section('content')
<div style="display:block;height:5rem;width:100%;"></div>
<div class="card card-default">
<div class="card-body">
	<div class="card-title text-center">
		<h3>Formulario para actualizar productos</h3>
	</div>



<div class="container-fluid">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('libros/actualizar') }}" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" required>
        <input type="hidden" name="id" value="{{$libro->id }}" required>
        
		<div class="form-group">
			<label class="col-md-4 control-label">Nombre</label>
			<div class="col-md-6">
                            <input type="text" class="form-control" name="nombre" value="{{$libro->nombre}}" required>
			</div>
		</div>
      
		<div class="form-group">
			<label class="col-md-4 control-label">Descripción</label>
			<div class="col-md-6">
				<textarea type="text" class="form-control" name="descripcion" rows="3" required>{{$libro->descripcion}}</textarea>
			</div>
		</div>
        <div class="form-group">
			<label class="col-md-4 control-label">cantidad</label>
			<div class="col-md-6">
                <input type="text" class="form-control" name="cantidad" value="{{$libro->cantidad}}" required>
			</div>
		</div>
        <div class="form-group">
			<label class="col-md-4 control-label">Precio</label>
			<div class="col-md-6">
                            <input type="text" class="form-control" name="precio" value="{{$libro->precio}}" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Imagen max: 20MB</label>
			<div class="col-md-6">
				<input type="file" class="form-control" name="imagen" required>
			</div>
		</div>
		<div class="btn-group" role="group" aria-label="Basic example">
			<input type="submit" class="btn btn-primary" value="Actualizar" />
			<input type="reset" class="btn btn-danger" value="Reset" />
		</div>
	</form>
</div>

</div>
</div>

@endsection

