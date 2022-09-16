<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Foro</title>

        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                
            }
            .hero{
            position: relative;
            padding: 20px 0 20px 0;
            min-height: 800px;
            background:url('imagenes/fondo.jpg') no-repeat center center;
            background-size: cover;
            color: #fff;
            }
            .hero h1 {
                margin: 200px 0 45px 0;
                font-weight: 300;
                font-size: 45px;
            }
            .hero {
                width: 100%;
                height: 100%;
            }
            .use-btn {
            display: inline-block;
            margin: 0 10px 10px 0;
            padding: 20px 50px;
            border-radius: 3px;
            background-color: #fff;
            color: #4b98a9;
            font-size: 16px;
            }
            .use-btn:hover, .use-btn:focus {
                background-color: #73d0da;
                color: #fff;
                text-decoration: none;
            }
            .learn-btn{
                display: inline-block;
                padding: 18px 46px;
                border: 2px solid #fff;
                border-radius: 3px;
                color: #fff;
                font-size: 16px;
            }
            .learn-btn:hover{
                border-color: #73d0da;
                color: #73d0da;
                text-decoration: none;
            }
        </style>
    </head>
    <body> 
        <section class="hero">
            <div class="col-md-6 col-sm-6 col-xs-6 text-left">
                    <a href="{{ url('/') }}"><img src="imagenes/logo.png" alt="Boxify Logo" style="width: 140px; padding: 0px 0px 0px 3%;"></a>
            </div>
            <div class="container">
                <div class="row hero-content">
                    <div class="col-md-12" style=" text-align: center;">
                        <h1 class="animated fadeInDown">Únete a esta comunidad y empieza a colaborar!</h1>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="learn-btn animated fadeInUp">¿Ya tienes una cuenta?</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="use-btn animated fadeInUp">Crea una cuenta</a> 
                                @endif
                            @endauth
                        @endif 
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
