@extends('layouts.app')

@section('content')
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.2.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <ul>
                Menu
                <li><a href="{{ url('/preguntas') }}">Preguntas</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="row justify-content-center">
                <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Preguntas</div>
                <div class="card-body">
                <button type="button" class="btn btn-success" onclick="$('#PublicarPregunta').modal('show');" >Agregar Compra</button>
                
                </div>
            </div>
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