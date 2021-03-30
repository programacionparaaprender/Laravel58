@extends('app')
@section('content')
<div style="display:block;width:100%;height:5rem;"></div>
<div class="card card-default" style="width:55rem;padding:1rem;">
    <div class="card-body">
        <div class="card-header"><h3 class="text-center">Formulario de Pedidos</h3></div>
@if(sizeof($pedidos) > 0)

<!--tabla de estado en espera-->
<h1>Pedidos en espera</h1>
<table class="table table-bordered">
<thead>
    <tr>
        <th>Pedido Nro </th>
        <th>Nombre y Apellido representante</th>
        <th>Estado del pedido</th>
        <th>Fecha</th>
        <th>Actualizar</th>
    </tr>
</thead>
<tbody>
  @foreach($pedidos as $pedido)
  @if($pedido->idestado==1)
  <tr>
      <td>
          {{$pedido->id}}
      </td>
      @foreach($users as $user)
      @if($user->id == $pedido->idusers)
      <td>
          <p><a href="{{url('pedidos/mostrar-representante',[$pedido->id])}}">{{ $user->name}}{{ $user->email}}</a></p>
      </td>
      @endif
      @endforeach

      <form class="form-horizontal" role="form" action="{{url('pedidos/actualizar')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
            <input type="hidden" name="id" value="{{$pedido->id }}" required>
            <div class="form-group required">

              <!--<div class="col-sm-3">-->
              <td>
              <select name="selector" required>
                  <optgroup label="Estados">
                      @foreach($estadopedidos as $estadopedido)
                      @if($estadopedido->id!=$pedido->idestado)
                      <option value="{{$estadopedido->id }}">{{$estadopedido->nombre}}</option>
                      @else
                      <option value="{{ $pedido->idestado }}" selected>{{$estadopedido->nombre}}</option>
                      @endif
                      @endforeach
                  </optgroup>
              </select>
              <!--</div>-->
              </td>
            </div>
              <td>
              {{ $pedido->created_at }}
              </td>
            <div class="form-group">
                <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary">
                Actualizar pedido
                </button>
                  <a 
                    href="{{url('pedidos/factura',[$pedido->id])}}" 
                    class="btn btn-secondary" 
                    role="button" 
                    target="_blank">
                    Visualizar Factura
                  </a>
                  <a 
                    href="{{url('pedidos/factura2',[$pedido->id])}}" 
                    class="btn btn-info" 
                    role="button" 
                    target="_blank">
                    Visualizar Nueva
                  </a>
                </div>
                </td>
          </div>
      </form>
  </tr>
  @endif
  @endforeach
</tbody>
</table>

<!--tabla de estado pagado-->
<h1>Pedidos pagados</h1>
<table class="table table-bordered">
<thead>
<tr>
    <th>Pedido Nro </th>
    <th>Nombre y Apellido representante</th>
    <th>Estado del pedido</th>
    <th>Fecha</th>
    <th>Actualizar</th>
</tr>
</thead>
        <tbody>
@foreach($pedidos as $pedido)
@if($pedido->idestado==2)
<tr>
    <td>
        {{$pedido->id}}
    </td>
    @foreach($representantes as $representante2)
    @if($representante2->id == $pedido->idrepresentante)
    <td>
        <p><a href="{{url('pedidos/mostrar-representante',[$pedido->id])}}">{{ $representante2->nombre}}{{ $representante2->apellido}}</a></p>
    </td>
    @endif
    @endforeach

      <form class="form-horizontal" role="form" action="{{url('pedidos/actualizar')}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
          <input type="hidden" name="id" value="{{$pedido->id }}" required>
          <div class="form-group required">

            <!--<div class="col-sm-3">-->
            <td>
            <select name="selector" required>
                <optgroup label="Estados">
                    @foreach($estadopedidos as $estadopedido)
                    @if($estadopedido->id!=$pedido->idestado)
                    <option value="{{$estadopedido->id }}">{{$estadopedido->nombre}}</option>
                    @else
                    <option value="{{ $pedido->idestado }}" selected>{{$estadopedido->nombre}}</option>
                    @endif
                    @endforeach
                </optgroup>
            </select>
            <!--</div>-->
            </td>
          </div>
          <td>
        {{ $pedido->created_at }}
           </td>
          <div class="form-group">
              <td>
            <!--<div class="col-sm-4 col-md-offset-4">-->
              <button type="submit" class="btn btn-primary">
              Actualizar pedido
              </button>
              <a href="{{url('pedidos/factura',[$pedido->id])}}" class="btn btn-default" role="button" target="_blank">Visualizar Factura</a>
            <!--</div>-->
              </td>
        </div>
      </form>
</tr>
@endif
@endforeach
</tbody>
</table>

<!--tabla de estado enviado-->
<h1>Pedidos enviados</h1>
<table class="table table-bordered">
<thead>
<tr>
    <th>Pedido Nro </th>
    <th>Nombre y Apellido representante</th>
    <th>Estado del pedido</th>
    <th>Fecha</th>
    <th>Actualizar</th>
</tr>
</thead>
        <tbody>
@foreach($pedidos as $pedido)
@if($pedido->idestado==3)
<tr>
    <td>
        {{$pedido->id}}
    </td>
    @foreach($representantes as $representante2)
    @if($representante2->id == $pedido->idrepresentante)
    <td>
        <p><a href="{{url('pedidos/mostrar-representante',[$pedido->id])}}">{{ $representante2->nombre}}{{ $representante2->apellido}}</a></p>
    </td>
    @endif
    @endforeach

      <form class="form-horizontal" role="form" action="{{url('pedidos/actualizar')}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
          <input type="hidden" name="id" value="{{$pedido->id }}" required>
          <div class="form-group required">

            <!--<div class="col-sm-3">-->
            <td>
            <select name="selector" required>
                <optgroup label="Estados">
                    @foreach($estadopedidos as $estadopedido)
                    @if($estadopedido->id!=$pedido->idestado)
                    <option value="{{$estadopedido->id }}">{{$estadopedido->nombre}}</option>
                    @else
                    <option value="{{ $pedido->idestado }}" selected>{{$estadopedido->nombre}}</option>
                    @endif
                    @endforeach
                </optgroup>
            </select>
            <!--</div>-->
            </td>
          </div>
            <td>
        {{ $pedido->created_at }}
            </td>
          <div class="form-group">
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
              <button type="submit" class="btn btn-primary">
              Actualizar pedido
              </button>
              <a href="{{url('pedidos/factura',[$pedido->id])}}" class="btn btn-default" role="button" target="_blank">Visualizar Factura</a>
            </div>
              </td>
        </div>
      </form>
</tr>
@endif
@endforeach
</tbody>
</table>

<!--tabla de estado devuelto-->
<h1>Pedidos devuelto</h1>
<table class="table table-bordered">
<thead>
<tr>
    <th>Pedido Nro </th>
    <th>Nombre y Apellido representante</th>
    <th>Estado del pedido</th>
    <th>Fecha</th>
    <th>Actualizar</th>
</tr>
</thead>
<tbody>
@foreach($pedidos as $pedido)
@if($pedido->idestado==4)
<tr>
    <td>
        {{$pedido->id}}
    </td>
    @foreach($representantes as $representante2)
    @if($representante2->id == $pedido->idrepresentante)
    <td>
        <p><a href="{{url('pedidos/mostrar-representante',[$pedido->id])}}">{{ $representante2->nombre}}{{ $representante2->apellido}}</a></p>
    </td>
    @endif
    @endforeach

      <form class="form-horizontal" role="form" action="{{url('pedidos/actualizar')}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
          <input type="hidden" name="id" value="{{$pedido->id }}" required>
          <div class="form-group required">

            <!--<div class="col-sm-3">-->
            <td>
            <select name="selector" required>
                <optgroup label="Estados">
                    @foreach($estadopedidos as $estadopedido)
                    @if($estadopedido->id!=$pedido->idestado)
                    <option value="{{$estadopedido->id }}">{{$estadopedido->nombre}}</option>
                    @else
                    <option value="{{ $pedido->idestado }}" selected>{{$estadopedido->nombre}}</option>
                    @endif
                    @endforeach
                </optgroup>
            </select>
            <!--</div>-->
            </td>
          </div>
            <td>
        {{ $pedido->created_at }}
            </td>
          <div class="form-group">
              <td>
            <!--<div class="col-sm-4 col-md-offset-4">-->
              <button type="submit" class="btn btn-primary">
              Actualizar pedido
              </button>
              <a href="{{url('pedidos/factura',[$pedido->id])}}" class="btn btn-default" role="button" target="_blank">Visualizar Factura</a>
            <!--</div>-->
              </td>
        </div>
      </form>
</tr>
@endif
@endforeach
</tbody>
</table>

<!--tabla de estado aprobado-->
<h1>Pedidos aprobados</h1>
<table class="table table-bordered">
<thead>
<tr>
    <th>Pedido Nro </th>
    <th>Nombre y Apellido representante</th>
    <th>Estado del pedido</th>
    <th>Fecha</th>
    <th>Actualizar</th>
</tr>
</thead>
<tbody>
@foreach($pedidos as $pedido)
@if($pedido->idestado==5)
<tr>
    <td>
        {{$pedido->id}}
    </td>
    @foreach($representantes as $representante2)
    @if($representante2->id == $pedido->idrepresentante)
    <td>
        <p><a href="{{url('pedidos/mostrar-representante',[$pedido->id])}}">{{ $representante2->nombre}}{{ $representante2->apellido}}</a></p>
    </td>
    @endif
    @endforeach

      <form class="form-horizontal" role="form" action="{{url('pedidos/actualizar')}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
          <input type="hidden" name="id" value="{{$pedido->id }}" required>
          <div class="form-group required">

            <!--<div class="col-sm-3">-->
            <td>
            <select name="selector" required>
                <optgroup label="Estados">
                    @foreach($estadopedidos as $estadopedido)
                    @if($estadopedido->id!=$pedido->idestado)
                    <option value="{{$estadopedido->id }}">{{$estadopedido->nombre}}</option>
                    @else
                    <option value="{{ $pedido->idestado }}" selected>{{$estadopedido->nombre}}</option>
                    @endif
                    @endforeach
                </optgroup>
            </select>
            <!--</div>-->
            </td>
          </div>
            <td>
            {{ $pedido->created_at }}
            </td>
          <div class="form-group">
              <td>
            <!--<div class="col-sm-4 col-md-offset-4">-->
              <button type="submit" class="btn btn-primary">
              Actualizar pedido
              </button>
              <a href="{{url('pedidos/factura',[$pedido->id])}}" class="btn btn-default" role="button" target="_blank">Visualizar Factura</a>
            <!--</div>-->
              </td>
        </div>
      </form>
</tr>
@endif
@endforeach
</tbody>
</table>
@else
<div class="alert alert-danger">
    <p>Al parecer no tiene pedidos actualmente.</p>
</div>
@endif
</div>
</div>
</div>
@endsection
