@extends('app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container">
<h1>Editar post</h1>
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('post.update', ['post' => $post->id]) }}" method="post">
@method('PUT')
@csrf
<label for="titulo">Título</label>
<input type="text" value="{{ $post->titulo }}" class="form-control" id="titulo" name="titulo" />
<label for="contenido">Contenido</label>
<textarea name="contenido"  id="contenido" class="form-control">
{{ $post->contenido }}
</textarea>
<label for="autor">Autor</label>
<select name="id_autor" id="id_autor" class="form-control">
<option>Seleccione</option>
@foreach($autores as $item)
    <option value="{{ $item->id }}"
    @if($item->id == $post->id_autor)
    selected
    @endif
    >
    {{ $item->name  }}
    </option>
@endforeach
</select>
<hr>
<button class="btn btn-success">Actualizar</button>
</form>
</div>
<!-- <h1>Lista de posts</h1>
{{dd($post)}}
</div> -->
@endsection
