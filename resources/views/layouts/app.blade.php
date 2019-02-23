<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('bootstrap/dist/js/bootstrap.min.js')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script type="text/javascript" src="js/task.js"></script>
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        @guest
        @else
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel corNav" style="background-color: #917dca; color: white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: white">
                    <b>{{ 'TASK MANAGER' }}</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a href="{{ url('/') }}" style="color: white">
                        <li >Resumo do Dia</li>
                        </a>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                    <a href="/usuarios" style="color: white">
                        <li>Usuários</li>
                    </a>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <a href="/categorias" style="color: white">
                            <li>Categorias</li>
                        </a>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <a href="/tarefas" style="color: white">
                            <li>Tarefas</li>
                        </a>
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                                <a class="" style="color:white" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endguest

        <main class="py-4 teste">
            @yield('content')
        </main>
    </div>
</body>
</html>
