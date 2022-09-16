@extends('layouts.app')

@section('content')
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
                    <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido!
                
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
   
</div>
@endsection
