@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div class="row">
        <div class="col-8">
            <h3>Explora nuestras preguntas</h3>
        </div>
        <div class="col-4" align="right">
            <button type="button" class="btn btn-success" onclick="$('#PublicarPregunta').modal('show');" >Formular una pregunta</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @foreach($preguntas as $pregunta)
                        <div class="card border-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $pregunta->titulo }}</h6>
                                        <p class="card-text">{{ $pregunta->etiquetas }}</p>
                                        <footer class="blockquote-footer">Publicada por <cite title="Source Title"></cite></footer>
                                    </div>
                                    <div class="col-2" style="display: flex;justify-content: center;align-items: center;">
                                        <a class="btn btn-primary" href="{{ route('preguntas.show', $pregunta->id) }}">
                                            Ver más
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div id="PublicarPregunta" class="modal fade show" tabindex="-1">
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
    </div>        
</div>
@endsection