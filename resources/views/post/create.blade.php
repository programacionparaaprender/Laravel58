@extends('app')

@section('content')
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
<form action="{{ route('post.store') }}" method="post">
@csrf
<label for="titulo">Título</label>
<input type="text" class="form-control" id="titulo" name="titulo" />
<label for="contenido">Contenido</label>
<textarea name="contenido"  id="contenido" class="form-control">

</textarea>
<label for="autor">Autor</label>
<select name="id_autor" id="id_autor" class="form-control">
<option>Seleccione</option>
@foreach($autores as $item)
    <option value="{{ $item->id }}">
    {{ $item->name  }}
    </option>
@endforeach
</select>
<hr>
<button class="btn btn-success">Crear</button>
</form>
</div>

@endsection
