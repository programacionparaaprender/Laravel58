@extends('app')
@section('content')

<!-- {!! $libros->render() !!} -->
    <div style="display:block;height:5rem;width:100%;"></div>
    @if(Session::has('creada'))
<div class="alert alert-success">
    <p>{{Session::get('creada')}}</p>
</div>
@endif
<div class="container-fluid">
@if (Auth::guest())
<h1>Productos disponibles en Programación Para Aprender </h1>
@else
<h1>Productos disponibles en Programación Para Aprender </h1>
@if(Auth::user()->estado==1)
<p class="bs-component">
<a href="libros/create" class="btn btn-secondary" role="button">Crear Producto</a>
</p>
@endif
@endif
    <form class="form-inline">
    <div class="form-group" style="width:20rem;">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    Buscar
                </span>
            </div>
            <input 
                type="text" 
                v-model="searchText"
                class="form-control" 
                :placeholder="Escribe un producto" />
        </div>
    </div>
    </form>
    <div class="row">
        <Productos v-bind:busqueda="searchText">
        </Productos>
    </div>
</div>
@endsection

@section('scripts')
        <script src="js/vue.js"></script>
        <script type="text/javascript">
            var template = 
            @if (Auth::guest())
            `<div v-for="libro in libros | filterBy busqueda in 'nombre'" class="col-xl-3 col-md-12 col-lg-6 col-sm-12 col-xs-12">
    
    <div class="card card-default" style="width: 19rem; height: 28rem; paddign:0.5rem;">
     <img 
                v-bind:src="libro.ruta" 
                width="150px" 
                height="150px" 
                class="card-img-top" 
                style="paddign:5rem;"
                 alt="...">
            <div class="card-body">
                <h3 class="card-title">@{{ libro.nombre }}</h3> 
                <p class="card-text" style="overflow:hidden;">@{{ libro.descripcion }}</p>
                <p class="card-text" style="overflow:hidden;">Disponible en stock @{{ libro.cantidad }} precio @{{ libro.precio }} $</p>
                <form action="{{ url('carrito/') }}" method="POST"  class="form-horizontal">
                   <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}" required>
                    <input class="form-control" type="hidden" name="id" value="@{{ libro.id }}" required>
                    <input class="form-control" type="hidden" name="name" value="@{{ libro.nombre }}" required>
                    <input class="form-control" type="hidden" name="price" value="@{{ libro.precio }}" required>
                   <label>Cantidad</label>
              <input class="form-control" type="text" name="qty" value="0" size="5">
             
                        </form>
                   </div>
        
               </div>`
            @elseif(Auth::user()->estado==1)
            `<div v-for="libro in libros | filterBy busqueda in 'nombre'" class="col-xl-3 col-md-12 col-lg-6 col-sm-12 col-xs-12">
    
            <div class="card card-default" style="width: 19rem; height: 30rem; paddign:0.5rem;">
     <img 
                v-bind:src="libro.ruta"  
                width="150px" 
                height="150px" 
                class="card-img-top" 
                style="paddign:5rem;"
                 alt="...">
            <div class="card-body">
                <h3 class="card-title">@{{ libro.nombre }}</h3> 
                <p class="card-text" style="overflow:hidden;">@{{ libro.descripcion }}</p>
                <p class="card-text" style="overflow:hidden;">Disponible en stock @{{ libro.cantidad }} precio @{{ libro.precio }} $</p>
                <form action="{{ url('carrito/') }}" method="POST"  class="form-horizontal">
                   <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}" required>
                    <input class="form-control" type="hidden" name="id" value="@{{ libro.id }}" required>
                    <input class="form-control" type="hidden" name="name" value="@{{ libro.nombre }}" required>
                    <input class="form-control" type="hidden" name="price" value="@{{ libro.precio }}" required>
                
              
             

                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                Cantidad
                                </span>
                            </div>
                            <input class="form-control" type="text" name="qty" value="0" size="5">
                            <div class="input-group-prepend">
                            <input class="btn btn-success" role="button" type="submit" value="Comprar"/>
                            </div>
                    </div>


                        </form>
                
                    <form action="carrito/destruir/@{{ libro.id }}" method="GET">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" required>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a type="button" href="libros/actualizar/@{{ libro.id }}" class="btn btn-primary" role="button">Editar libro</a>
                            <input class="btn btn-danger" role="button" type="submit" value="Eliminar"/>
                        </div>
                    </form>
       
                
                   </div>
        
               </div>`
            @elseif(Auth::user()->estado==3 || Auth::user()->estado==2)
            `<div v-for="libro in libros | filterBy busqueda in 'nombre'" class="col-xl-3 col-md-12 col-lg-6 col-sm-12 col-xs-12">
    
            <div class="card card-default" style="width: 19rem; height: 28rem; paddign:0.5rem;">
     <img 
                v-bind:src="libro.ruta" 
                width="150px" 
                height="150px" 
                class="card-img-top" 
                style="paddign:5rem;"
                 alt="...">
            <div class="card-body">
                <h3 class="card-title">@{{ libro.nombre }}</h3> 
                <p class="card-text" style="overflow:hidden;">@{{ libro.descripcion }}</p>
                <p class="card-text" style="overflow:hidden;">Disponible en stock @{{ libro.cantidad }} precio @{{ libro.precio }} $</p>
                <form action="{{ url('carrito/') }}" method="POST"  class="form-horizontal">
                    <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}" required>
                    <input class="form-control" type="hidden" name="id" value="@{{ libro.id }}" required>
                    <input class="form-control" type="hidden" name="name" value="@{{ libro.nombre }}" required>
                    <input class="form-control" type="hidden" name="price" value="@{{ libro.precio }}" required>
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                Cantidad
                                </span>
                            </div>
                            <input class="form-control" type="text" name="qty" value="0" size="5">
                            <div class="input-group-prepend">
                            <input class="btn btn-success" role="button" type="submit" value="Comprar"/>
                            </div>
                    </div>
                </form>
                   </div>
        
               </div>`
            @endif
            const Productos = Vue.component('productos-component',{
                template: template,
                data: function() {
                    return {
                            admin: 0
                            ,libros: [
                        @if(sizeof($libros) > 0)
                        @foreach($libros as $index => $libro)
                            { 
                                id:{{ $libro->id }},
                                nombre:'{{ $libro->nombre }}',
                                descripcion:'{{ $libro->descripcion }}',
                                precio:{{$libro->precio}},
                                cantidad:{{$libro->cantidad}},
                                ruta:'{{ $libro->ruta }}',
                                index:{{ $index }}
                            },
                        @endforeach
                        @else
                            { 
                                id:1,
                                nombre:'PHP',
                                descripcion:'PHP',
                                cantidad:0,
                                precio:0,
                                ruta:'img/text.png'
                            },
                        @endif
                        ],
                    }
                },
                async mounted(){

                },
                props: {
                    busqueda:String
                },
                methods:{

                }
            });
            new Vue({
                el: 'body',
                components:{
                    Productos
                },
                data:{
                    searchText:'',
                    admin:0
                           
                    ,libros: [
                        @if(sizeof($libros) > 0)
                        @foreach($libros as $index => $libro)
                            { 
                                id:{{ $libro->id }},
                                nombre:'{{ $libro->nombre }}',
                                descripcion:'{{ $libro->descripcion }}',
                                precio:{{$libro->precio}},
                                ruta:'{{ $libro->ruta }}',
                                index:{{ $index }}
                            },
                        @endforeach
                        @else
                            { 
                                id:1,
                                nombre:'PHP',
                                descripcion:'PHP',
                                precio:0,
                                ruta:'img/text.png'
                            },
                        @endif
                        ],
                },
                filters: {

                },
                methods: {
                    indices: function (index) {
                      if (index % 4 == 0) return '<div class="row">'
                    },
                    indices2: function (index) {
                      if (index % 4 == 0) return '</div>'
                    },
                }
            });
        </script>
@endsection