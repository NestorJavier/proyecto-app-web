<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- fullcalendar scripts and style sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{ asset('fullcalendar/lib/main.css') }}"z rel='stylesheet' />
    <script src="{{ asset('fullcalendar/lib/main.js') }}"></script>
    
    <!-- variables needed in fullcalendar/calendar.js -->
    <script>
        let url_ = "{{ url('evento') }}";
        let url_show = "{{ url('/evento/show') }}";
    </script>
    <!-- main callendar file -->
    <script src="{{ asset('fullcalendar/calendar.js') }}"></script>

    <!-- jquery and bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/custom_styles.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        a {
            color: black;
        }
        #calendar {
            max-width: 80vw;
            margin: 3rem auto;
            background-color: white;
            border-radius: 5px;
        }

        body {
            background-color: #5067c5;
        }
    </style>

    <title>Eventos</title>
</head>
<body>

<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="titulo-encabezado mx-auto">
                    <h1>Planeador Universitario</h1>
                </div>
                @auth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        
                    </ul>
                </div>
                @endauth
            </div>
        </nav>
    </div>

    <div class="container">
    

    <div class="col-8 col-md-2" style="margin">
                <h6 style="visibility: hidden;">con</h6>
                <a class="btn btn-primary" href="/home" role="button">Regresa</a>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="titulo">Titulo:</label>
                            <input class="form-control" type="text" name="titulo" id="titulo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fecha">Inicio:</label>
                            <input class="form-control" disabled type="text" name="fecha" id="fecha">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="txtDescripcion">Descripción:</label>
                            <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" cols="30" rows="3"></textarea>
                        </div>
                        <input type="hidden" id="eventoId" name="eventoId" value="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="btnAgregar">Agregar</button>
                    <button class="btn btn-warning" id="btnModificar">Modificar</button>
                    <button class="btn btn-danger" id="btnEliminar">Borrar</button>
                    <button data-dismiss="modal" class="btn btn-light" id="btnCancelar">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div id='calendar'></div>
</body>
</html>
