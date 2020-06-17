<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="636111456183-3c81ocn170cq80ced5aqvrng79tcs7ls.apps.googleusercontent.com">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->    
    <script src="{{ asset('js/app.js') }}"></script> 
    <script src="{{asset('js/controller/AppController.js')}}"></script>    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">   
    <style>
        .label-input{
            position: relative;
        }
        .label-input label{
            position: absolute;
            top: 0%;
            left: 0%;
            margin: 0px !important;
            height: 100%;
            z-index: -1;
            text-align: right;
        }
        .label-input select{
            background-color: transparent;
        }
        .label-input select:focus{
            box-shadow: none;
            outline: none;
            background-color: rgba(230,230,230,.5);
        }
        .label-input select option{
            background: white !important;
        }
    </style>                
</head>
<body class="position-relative bg-light"> 
    @auth       
        <button class="button btn btn-dark h-100" id="open-close-nav">
            <i class="fas fa-angle-right fa-2x"></i>
        </button>    
    @endauth
    
    <div id="app"> 
        @auth   
            <!--Nav Lateral-->                                          
            <div class="navegador shadow-lg" id="nav">
                <aside class="left-nav h-100 d-flex flex-column position-fixed bg-white">                    
                    <div class="group">
                        <h4 class="h4 pl-2">Innovacion</h4>
                        <div class="nav-header mb-3">
                            <button type="button" class="button btn btn-warning d-flex justify-content-between align-items-center rounded" data-toggle="collapse" data-target="#user-menu">                            
                                <div>
                                    <i class="far fa-user mt-1 mr-2"></i>
                                    {{Auth::user()->nombre_usuario}}
                                </div>
                                <i class="fas fa-chevron-down mr-2 mx-2"></i>
                            </button>                                                    
                            <div class="collapse position-absolute bg-white" id="user-menu">
                                <div class="item">
                                    <a href="" class="button-link">
                                            <i class="fas fa-user-cog mt-1 mx-2"></i> {{__('Perfil')}}
                                    </a>
                                </div>                                
                                <div class="item">
                                    <a class="button-link" href=""
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt mt-1 mx-2"></i> {{ __('Logout') }} 
                                    </a>

                                    <form id="logout-form" action="{{ __('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                <div class="item">
                                    <a href="#" class="button button-link text-center" data-toggle="collapse" data-target="#user-menu">
                                        <i class="fas fa-chevron-up"></i>
                                    </a>                                    
                                </div>
                            </div>
                        </div>                        
                        <div class="nav-seccion">
                            <div class="w-auto py-4 h-100 rounded mx-1">
                                <div class="picture">
                                    <img src="" alt="user-picture"/>
                                </div>
                            </div>
                        </div>
                        <div class="nav-seccion label-input">
                            <label for="roles" class="w-100 text-center py-2 my-1 rounded border border-md border-warning">
                                <strong>Roles</strong><i>(Seleccionar rol actual.)</i>
                            </label>
                            <select name="group-select" id="roles" class="form-control border-warning" v-on:change="cambiaRol" v-model="rolElegido.rol">
                                <option v-for="rol in roles" v-bind:value="rol.id_rol">@{{rol.nombre}}</option>                                    
                            </select>                                
                        </div>
                    </div>
                    <div class="nav-left-items" style="margin-left:2em;">
                        <div class="list position-relative" style="height:200px; overflow-y: scroll;" data-spy="scroll" data-offset="0">
                            @if (Session::has('contenido_nav'))
                                @include(Session::get('contenido_nav'))
                            @else
                                @include('layouts.contenidoNav.personaNatural')
                            @endif                                
                        </div>                                                      
                    </div>                             
                    <div class="nav-footer text-center text-white bg-dark">
                        <small>Todos los derechos reservados.</small>
                    </div>                                                                                                                   
                </aside>                                
            </div>         
            <!--Navegador Horizontal-->     
            <nav class="navbar navbar-expand-lg navbar-light ml-4 bg-white shadow-sm" id="navbar" >               	
                <a class="navbar-brand" href="{{url('/retos')}}">
                    <img src="{{url('img/innexsa.png')}}" class="img-fluid" style="max-width:90px !important;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Inicio <span class="sr-only">(current)</span></a>
                        </li>                                                                                                      
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('retos')}}">Retos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>                                           
                    </ul>
                </div>                
            </nav>            
        @endauth
        <div class="@if(Auth::check()) {{'content'}} @else {{''}} @endif">
            <main>
                @yield('content')
            </main>
        </div>      
    </div>    
    <script src="{{asset('js/controller/RolController.js')}}"></script>  
    <script src="{{asset('js/nav.js')}}"></script>          
</body>
</html>

