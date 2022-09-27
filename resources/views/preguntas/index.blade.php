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
                        <div class="card-header">Preguntas</div>
                        <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="$('#PublicarPregunta').modal('show');" >Publicar pregunta</button>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Codigo</th>
                                        <th>Etiquetas</th>
                                        <th>
                                            Elminar
                                        </th>
                                        <th>
                                            Ver más
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($preguntas as $pregunta)
                                        <tr>
                                            <td>{{ $pregunta->titulo }}</td>
                                            <td>{{ $pregunta->descripcion }}</td>
                                            <td>{{ $pregunta->codigo }}</td>
                                            <td>{{ $pregunta->etiquetas }}</td>
                                            <td>
                                                <form action="{{ route('preguntas.destroy' , $pregunta->id ) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                            <td>  <a href="{{ route('preguntas.show', $pregunta->id) }}">
                                                Ver más
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if(Session::get('mensaje'))
                                <div class="alert alert-{{Session::get('color-class')}} mt-3" role="alert">
                                    {{ Session::get('mensaje') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="row justify-content-center">
                <div class="col-md-10">
                @foreach($preguntas as $pregunta)
                    <div class="card">
                        
                           
                        <div class="card-header">
                            {{ $pregunta->titulo }}
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $pregunta->descripcion }}</h6>
                            <p class="card-text">{{ $pregunta->codigo }}</p>
                            <p class="card-text">{{ $pregunta->etiquetas }}</p>
                            <footer class="blockquote-footer">Publicada por <cite title="Source Title"></cite></footer>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div id="PublicarPregunta" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Publicar Pregunta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <form id="form-create" action="{{ url('preguntas') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Titulo</label>
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
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Etiquetas</label>
                        <input type="text" class="form-control" id="etiquetas" name="etiquetas" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-success">
                    Publicar pregunta
                </button>
            </div>
        </form>
    </div>
</div>

@endsection