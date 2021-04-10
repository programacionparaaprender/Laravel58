@extends('app')

@section('content')
<div style="height:10rem;width:100%;display:block;"></div>
<div class="card card-default">
    <div class="card-body">
        <div class="card-header"><h3>Formulario de registro de empleados</h3></div>
        <div class="container-fluid">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/validado/registrar-empleado') }}"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="col-md-4 control-label">Nombre</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-4 control-label">Correo electronico</label>
            <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Contraseña</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Repita la contraseña</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation">
            </div>
        </div>
        
        <input type="hidden" name="idnivel" value="1" required>
        <input type="hidden" name="nombreEscuela" value="inexistente" required>
        
       
        <div class="btn-group" role="group" aria-label="Basic example"> 
            <button type="submit" class="btn btn-primary">Registrarse</button>
            <input type="reset" value="Reset" class="btn btn-danger" />
        </div>
     
    </form>
</div>
    </div>
</div>
@endsection
