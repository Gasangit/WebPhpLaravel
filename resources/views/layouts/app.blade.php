<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LAG PROJECT</title>
    <link rel="icon" type="/img/logoInfinity" href="/img/logoInfinity.png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!--CSS-->
   <!-- <link rel="stylesheet" href="/css/app.css"> -->
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="body">
    <div id="app">
        <nav class="navbar navbar-expand-sm shadow-sm navbar-light fixed-top rounded-3 mt-3 mx-3" style="background-color: rgba(51,75,105,0.95);">
            <div class="container">
                <a class="navbar-brand" href="{{ url('home') }}">
                    <img src="/img/logoNombre.png" alt="LAG logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->  
                    @if( Auth::user() and Auth::user()->activo)
                        <ul class="navbar-nav me-auto">

                            <li class="nav-item dropdown">
                                <a class="nav-link active text-light dropdown-toggle fs-4" role="button" data-bs-toggle="dropdown" aria-current="page">Consolas</a>
                                <ul class="dropdown-menu">
                                    
                                    <!-- $arrayCategorias = session('arrayCategorias'); //<--- ver que pasa con esto (parece que no va, no me acuerdo por que intenté esto)-->

                                    @foreach($categorias as $objetoCategoria)  <!-- el array se usa acá -->
                                        <li><a class="dropdown-item" href="{{ route('productoscli.index',$objetoCategoria) }}">{{$objetoCategoria->nombre}}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                    @endif
                        @if ( Auth::user() and Auth::user()->is_admin)
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link active text-light dropdown-toggle fs-4" role="button" data-bs-toggle="dropdown" aria-current="page">Panel Admin</a>
                                <ul class="dropdown-menu">

                                    <li class="nav-item my-auto">
                                        <a class="dropdown-item" aria-current="page" href="{{ route('productos.index') }}">Administración de Juegos</a>
                                    </li>
                                    <li class="nav-item my-auto">
                                        <a class="dropdown-item" aria-current="page" href="{{ route('categorias.index') }}">Administración de Consolas</a>
                                    </li>
                                    <li class="nav-item my-auto">
                                        <a class="dropdown-item" aria-current="page" href="{{ route('users.index') }}">Administración de Usuarios</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    
                                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link  text-light fs-5" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link  text-light fs-5" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="font-weight:bold;" class="nav-link dropdown-toggle fs-4 text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('/img/usuario.png') }}" alt="usuario" weight="20" height="40"> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                   <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        <li class="nav-item mt-md-2 ms-md-3">
                            <a href="{{ route('productoscli.verCarrito') }}"><img src="/img/carro.png" alt="carrito" style="width: 35px" >
                            <span class="top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <!-- 5 -->
                                @if(isset($juegosEnCarrito))
                                    {{ $juegosEnCarrito }}
                                @else
                                    {{ 0 }}
                                @endif
                                <span class="visually-hidden">unread messages</span>
                              </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="margin-top: 10em; margin-bottom: 5em;">
            @yield('content')
        </main>

        <footer class="site-footer border-top mt-3"> 
            <div class="container mt-2">
                <div class="row mt-5 text-white text-center">              
                    <div class="col-12">
                        <ul class="list-unstyled">
                            <li><a href="{{ route('nosotros.show')}}" style="color: yellow; text-decoration: none; font-weight:bold;"><img src="{{ asset('/img/informacion.png') }}" alt="" width="32" height="32" style="margin-right:1em;">  SOBRE NOSOTROS</a></li>
                            <li class="mt-4"><a href="{{ route('contacto.show')}}" style="color: yellow; text-decoration: none; font-weight:bold;"><img src="{{ asset('/img/contacto.png') }}" alt="" width="32" height="32" style="margin-right:1em;">  CONTACTO/SOPORTE</a></li>
                        </ul>
                    </div>          
                
                    <div class="col mt-3">
                        <div class="block-5 mb-4">
                            <h3 class="footer-heading mb-4">Contacto</h3>
                            <ul class="list-unstyled">
                                <li class="address">Av. Siempreviva 742, Ciudad de Buenos Aires, Buenos Aires, Argentina</li>
                                <li class="phone"><a href="tel://23923929210">+54 9 11 4567 8958</a></li>
                                <li class="email">soporte@lagproject.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row flex justify-content-center mb-3">
                    <div class="col-12"><h4 class="text-light text-center fs-5">Seguinos en nuestras redes</h4></div>                
                    <div class="col-1 text-end"><a href=""><img src="{{ asset('/img/discord-icon.svg') }}" alt="" width="32" height="32"></a></div>
                    <div class="col-1 text-center"><a href=""><img src="{{ asset('/img/facebook.svg') }}" alt="" width="32" height="32"></a></div>
                    <div class="col-1 text-center"><a href=""><img src="{{ asset('/img/instagram-icon.svg') }}" alt="" width="32" height="32"></a></div>
                    <div class="col-1 text"><a href=""><img src="{{ asset('/img/twitter.svg') }}" alt="" width="32" height="32"></a></div>
                </div>
            </div>
        </footer>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>
