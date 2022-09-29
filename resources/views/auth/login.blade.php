@extends('layouts.app2')
@section('content')
<style>
    .login{
    background: #e4f7e7;
    max-width: 440px;
    padding: 130px 20px;
    margin: 0px auto;
    }
    .wrapper{
    width: 100%;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
    }
    .wrapper .title{
    height: 80px;
    background: #11101D;
    border-radius: 5px 5px 0 0;
    color: #fff;
    font-size: 28px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .wrapper form{
    padding: 30px 25px 25px 25px;
    }
    .wrapper form .row{
    height: 45px;
    margin-bottom: 15px;
    position: relative;
    }
    .wrapper form .row input{
    height: 100%;
    width: 100%;
    outline: none;
    padding-left: 60px;
    border-radius: 5px;
    border: 1px solid lightgrey;
    font-size: 16px;
    transition: all 0.3s ease;
    }
    form .row input:focus{
    border-color: #11101D;
    box-shadow: inset 0px 0px 2px 2px #11101D;
    }
    form .row input::placeholder{
    color: #999;
    }
    .wrapper form .row i{
    position: absolute;
    width: 47px;
    height: 100%;
    color: #fff;
    font-size: 18px;
    background: #11101D;
    border: 1px solid #11101D;
    border-radius: 5px 0 0 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .wrapper form .pass{
    margin: -8px 0 20px 0;
    }
    .wrapper form .pass a{
    color: #16a085;
    font-size: 17px;
    text-decoration: none;
    }
    .wrapper form .pass a:hover{
    text-decoration: underline;
    }
    .wrapper form .button input{
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    padding-left: 0px;
    background: #16a085;
    border: 1px solid #16a085;
    cursor: pointer;
    }
    form .button input:hover{
    background: #12876f;
    }
    .wrapper form .signup-link{
    text-align: center;
    margin-top: 20px;
    font-size: 17px;
    }
    .wrapper form .signup-link a{
    color: #16a085;
    text-decoration: none;
    }
    form .signup-link a:hover{
    text-decoration: underline;
    }
</style>
<div class="container">
    <div class="login">
        <div class="wrapper">
            <div class="title"><span>Iniciar sesión</span></div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email or Phone" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="pass">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="row button">
                    <input type="submit" value="Ingresar">
                </div>
                <div class="signup-link">
                    ¿No tienes cuenta? <a href="{{ route('register') }}">¡Registrate!</a>
                </div>
            </form>
            <button type="button" class="btn btn-success" onclick="$('#PublicarPregunta').modal('show');" >Formular una pregunta</button>
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
