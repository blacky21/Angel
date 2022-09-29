<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('./css/estilos.css') }}">
    <link rel="stylesheet" href="{{asset('./fontawesome-free/css/all.min.css')}}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-code-alt icon'></i>
      <div class="logo_name">Help</div>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li>
          <a href="{{ url('/preguntas') }}">
            <i class='bx bx-help-circle'></i>
            <span class="links_name">Todas las preguntas</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/mispreguntas') }}">
          <i class='bx bx-question-mark'></i>
            <span class="links_name">Mis preguntas</span>
          </a>
          <span class="tooltip">Messages</span>
        </li>
       
        <li class="profile">
            <div class="profile-details">
             
              <div class="name_job">
                
              </div>
            </div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                  @csrf
                  <i class='bx bx-log-out' id="log_out" ></i>
                </form>
            </a>
        </li>
    </ul>
  </div>
    <section class="home-section">
      @yield('content')
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="{{ asset('js/navbar.js') }}"></script>
</html>
