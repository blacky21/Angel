@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <div class="row">
        <div class="col-8">
            <h3>Mis preguntas</h3>
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
                                        <form action="{{ route('preguntas.destroy' , $pregunta->id ) }}" method="post" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true"></i></button>
                                    </form>
                                    <form action="{{ route('preguntas.destroy' , $pregunta->id ) }}" method="post" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
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
@endsection