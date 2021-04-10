@extends('app')
@section('content')
<div style="height:10rem;width:100%;display:block;"></div>
<div class="container-fluid">
@if(sizeof($representantes) > 0)

<!--tabla de representante activo-->
<h1>Roles de usuario</h1>
<table class="table table-bordered">
<thead>
    <tr>
        <th>Nro </th>
        <th>Nombre</th>
        <th>Estado</th>
        <th>Actualizar</th>
    </tr>
</thead>
<tbody>
@foreach($representantes as $representante)
<tr>
    <td>{{$representante->id}}</td>
    <td>{{ $representante->name}}</td>
      <form class="form-horizontal" role="form" action="{{url('validado/representante/rol')}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
          <input type="hidden" name="id" value="{{$representante->id }}" required>
          <div class="form-group required">

            <!--<div class="col-sm-3">-->
            <td>
            <select name="selector" required>
                <optgroup label="Roles">
                    @if($representante->estado==1)
                    <option value="1" selected>Administrador</option>
                    <option value="2">Empleado</option>
                    <option value="3">Cliente</option>
                    <option value="0">Inactivo</option>
                    @elseif($representante->estado==2)
                    <option value="1">Administrador</option>
                    <option value="2" selected>Empleado</option>
                    <option value="3">Cliente</option>
                    <option value="0">Inactivo</option>
                    @elseif($representante->estado==3)
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                    <option value="3" selected>Cliente</option>
                    <option value="0">Inactivo</option>
                    @else
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                    <option value="3">Cliente</option>
                    <option value="0" selected>Inactivo</option>
                    @endif
                </optgroup>
            </select>
            <!--</div>-->
            </td>
          </div>
          <div class="form-group">
              <td>
              <button type="submit" class="btn btn-primary">
              Actualizar rol
              </button>
              </td>
        </div>
      </form>
</tr>
@endforeach
</tbody>
</table>

@else
<div class="alert alert-danger">
    <p>Al parecer no tiene representantes actualmente.</p>
</div>
@endif
</div>
@endsection
