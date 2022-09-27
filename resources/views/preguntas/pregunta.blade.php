@extends('layouts.app')

@section('content')
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="resources/js/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            {{ $pregunta->titulo }}
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $pregunta->descripcion }}</h6>
                            <p class="card-text">{{ $pregunta->codigo }}</p>
                            <p class="card-text">{{ $pregunta->etiquetas }}</p>
                            <footer class="blockquote-footer">Publicada por <cite title="Source Title">{{ $usuario->name }}</cite></footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success" onclick="$('#PublicarRespuesta').modal('show');" >Publicar respuesta</button>
    </div>
        @foreach($respuestas as $respuesta)
            <div class="card">
                <div class="card-header">
                    {{ $respuesta->titulo }}
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">{{ $respuesta->descripcion }}</h6>
                    <p class="card-text">{{ $respuesta->codigo }}</p>
                    <footer class="blockquote-footer">Publicada por <cite title="Source Title">{{ $respuesta->user_name }}</cite></footer>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div id="PublicarRespuesta" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Publicar Respuesta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <form id="form-create" action="{{ url('respuestas') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Titulo</label>
                        <input type="hidden" class="form-control" id="pregunta_id" name="pregunta_id" value="{{ $pregunta->id }}" required>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Codigo</label>
                        <textarea class="form-control" id="codigo" name="codigo" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <br>
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-success">
                    Publicar respuesta
                </button>
            </div>
        </form>
    </div>
</div>
@endsection