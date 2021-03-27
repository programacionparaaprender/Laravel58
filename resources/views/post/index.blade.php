@extends('app')


@section('content')
<div class="container">
<h1>Lista de posts</h1>
<h1><a href="{{route('post.create')}}" class="btn btn-primary">Crear un post</a></h1>
<table class="table table-bordered">
<thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Titulo</th>
        <th scope="col">Contenido</th>
        <th scope="col">Autor</th>
        <th scope="col">Operaciones</th>
        <!-- <th>Operaciones2</th> -->
    </tr>
</thead>
<tbody>
@foreach($post as $item)
<tr>
<th scope="row">{{ $item->id  }}</th>
<td>{{ $item->titulo  }}</td>
<td>{{ $item->contenido  }}</td>
<td>{{ $item->autor->name  }}</td>
<td>
    <div class="btn-group" role="group" aria-label="Basic example">
    <a href="{{route('post.edit', ['id' => $item->id])}}" class="btn btn-warning btn-sm">Editar</a>
    <form action="{{route('post.destroy', ['id' => $item->id])}}" method="post">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger btn-sm">Eliminar</button>
    </form>
    </div>
</td>
<!-- <td>
    <a href="/LaravelApi/public/post/{{$item->id}}/edit" class="btn btn-warning btn-sm">
         <i class="fas fa-edit"></i> Editar
    </a>
    <a href="/LaravelApi/public/post/eliminar/{{$item->id}}" class="btn btn-danger btn-sm">
         <i class="far fa-trash-alt"></i> Eliminar
    </a>
</td> -->
</tr>
@endforeach
</tbody>
</table>
</div>

@endsection
