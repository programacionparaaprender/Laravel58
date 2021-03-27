@extends('app')
@section('content')
<div style="display:block;width:100%;height:5rem;"></div>
<div class="card card-default" style="width:55rem;padding:1rem;">
    <div class="card-body">
        <div class="card-header"><h3 class="text-center">Formulario de Compras</h3></div>
        @if(sizeof($pedidos) > 0)
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Nro</th>
                <th scope="col">Nombre y Apellido</th>
                <th scope="col">Estado del pedido</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>  
            </tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedido)
        <tr>
            <th scope="row">{{ $pedido->id  }}</th>
            @foreach($users as $user)
            @if($user->id == $pedido->idusers)
            <td>
                <p>{{ $user->name}}{{ $user->email}}</p>
            </td>
            @endif
            @endforeach
            <td>
                        @if($pedido->idestado==1)
                            EnEspera
                        @elseif($pedido->idestado==2)
                            Pagado
                        @elseif($pedido->idestado==3)
                            Enviado
                        @elseif($pedido->idestado==4)
                            Devuelto
                        @endif
            </td>
            <td>
                    {{ $pedido->created_at }}
            </td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a 
                        href="{{url('pedidos/notificar',[$pedido->id])}}" 
                        class="btn btn-secondary" 
                        role="button" 
                        target="_blank">
                        Notificar pago    
                    </a>
                    <a 
                        href="{{url('pedidos/factura',[$pedido->id])}}" 
                        class="btn btn-secondary" 
                        role="button" 
                        target="_blank">
                        Visualizar Factura
                    </a>
                </div>
            </td>
        </tr>
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
@endsection
