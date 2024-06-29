<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <title>@yield('title')- Autopartes</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="routName" content="{{Route::currentRouteName()}}">
    <meta name="currency" content="{{Config::get('marketplace.currency')}}">
    <meta name="auth" content="{{Auth::check()}}" >

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <script src="https://kit.fontawesome.com/1d70819719.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


  <!--<script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script> -->
    <script src="{{url('/static/js/mkslider.js?v='.time())}}"></script>  
    <script src="{{url('/static/js/site.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <link rel="stylesheet" href="{{url('/static/css/style.css?v='.time())}}">


</head>

<body>
    <nav class="navbar navbar-expand-lg shadow">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('static/images/logoRec.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
               </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link"><i class="fa-solid fa-house"></i> <span>Inicio</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link"><i class="fa-solid fa-shop"></i> <span>Tienda  </span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link"> <i class="fa-solid fa-user-tie"></i> <span>Sobre Nosotros</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link"><i class="fa-solid fa-shop"></i> <span>Puntos de recojo </span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link"><i class="fa-solid fa-phone"></i>  <span>Contacto</span></a>
                    </li>    
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link"><i class="fa-solid fa-cart-shopping"></i> <span class="carnumber">0</span> </a>
                    </li>                                                                           
                    @if(Auth::guest())
                        <li class="nav-item link-acc">
                            <a href="{{url('/login')}}" class="nav-link btn"><i class="fa-solid fa-lock-open"></i>  Ingresar</a>
                            <a href="{{url('/login')}}" class="nav-link btn"> <i class="fa-solid fa-user"></i> Crear cuenta</a>
                        </li>
                    @else
                          <li class="nav-item link-acc link-user dropdown">
                            <a href="{{url('/login')}}" class="nav-link btn dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                 @if(is_null(Auth::user()->avatar)) 
                                    <img src="{{url('/static/images/default_avatar.png')}}" alt="Avatar del usuarios">
                                @else
                                    <img src="{{url('/uploads_users/'.Auth::id().'/'.'av_'.Auth::user()->avatar)}}" alt="Avatar del usuarios">  
                                 @endif Hola : {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu shadow">
                                @if(Auth::user()->role == "1")
                                <li>
                                    <a class="dropdown-item" href=" {{url('/admin')}} "> <i class="fa-solid fa-screwdriver-wrench"></i>  Administración</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                           
                                @endif
                                    <li>
                                        <a class="dropdown-item" href=" {{url('/account/favorites')}} "><i class="fa-regular fa-heart"></i>Favoritos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=" {{url('/account/edit')}} "><i class="fa-solid fa-user-tie"></i>Mi cuenta</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{url('/logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i>Salir</a>
                                    </li>
                                    
                            </ul>
                        </li>                 
                    @endif
                </ul>
            </div>


        </div>
    </nav>
    @if(Session::has('message'))
        <div class="container-fluid">
        <div class="alert alert-{{Session::get('typealert')}} mtop16"style="display:block; margin-top:16px;">
        {{Session::get('message')}} 
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <script>
            $('.alert').slideDown();
            setTimeout(function(){$('.alert').slideUp(); }, 3000);
        </script>

        </div>
    </div>
    @endif
    <div class="wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>

</html>