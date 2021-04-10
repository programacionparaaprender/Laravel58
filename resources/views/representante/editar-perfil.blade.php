@extends('app')

@section('content')
<div style="height:10rem;width:100%;display:block;"></div>
<div class="card card-default">
    <div class="card-body">
        <div class="card-header"><h3>Editar Usuario</h3></div>
        <div class="container-fluid">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/validado/representante/editar-perfil') }}"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
        <div class="form-group required">
            <label class="col-md-4 control-label">Nombre</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Contraseña</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Repita la contarseña</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation">
            </div>
	    </div>
        <div class="btn-group" role="group" aria-label="Basic example">   
            <button type="submit" class="btn btn-primary">
                Actualizar perfil
            </button>
            <input type="reset" class="btn btn-danger" value="Reset" />
        </div>
	</div>
    </form>
</div>
    </div>
</div>
@endsection

