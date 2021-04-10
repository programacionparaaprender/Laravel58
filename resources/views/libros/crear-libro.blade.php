@extends('app')

@section('content')
<div style="display:block;height:5rem;width:100%;"></div>
<div class="card card-default">
<div class="card-body">
	<div class="card-title text-center">
		<h3>Formulario para crear productos</h3>
	</div>
	<div class="container-fluid">
	<form 
		class="form-horizontal" 
		role="form" 
		method="POST" 
		action="{{ url('libros/create') }}" 
		enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" required>
		<div class="form-group">
			<label class="col-md-4 control-label">Nombre</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Descripción</label>
			<div class="col-md-6">
				<textarea type="text" class="form-control" name="descripcion" rows="3" required>{{old('descripcion')}}</textarea>
			</div>
		</div>
        <div class="form-group">
			<label class="col-md-4 control-label">cantidad</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="cantidad" value="{{old('cantidad')}}" required>
			</div>
		</div>
        <div class="form-group">
			<label class="col-md-4 control-label">Precio $</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="precio" value="{{old('precio')}}" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">Imagen max: 20MB</label>
			<div class="col-md-6">
				<input type="file" class="form-control" name="imagen" required>
			</div>
		</div>
		<div class="btn-group" role="group" aria-label="Basic example">
			<input type="submit" class="btn btn-primary" value="Crear Libro" />
			<input type="reset" value="Reset" class="btn btn-danger" />
		</div>
	</form>
</div>
</div>
</div>
@endsection

