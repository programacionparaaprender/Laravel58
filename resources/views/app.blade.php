<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="principal.ico">
	<title>Programación para aprender</title>
        @yield('css')

        <!-- para bootstrap en archivos blade dentro de carpetas en views -->
        
    <!-- Estilos Bootstrap 4 -->	
	<link rel="stylesheet" href="{{ url('./css/bootstrap.css') }}">
    

</head>
<body>
<header class="container-fluid" style="font-style: italic;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container-fluid">
		
			<a class="navbar-brand" href="#/">
				<img src="{{ url('images/principal.jpg') }}" width="50" height="50" alt="">
			</a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuprincipal" aria-controls="menuprincipal" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="menuprincipal">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ url('/')}}">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ url('libros/') }}">Productos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ url('libros/') }}">Servicios</a>
					</li>
					
						@if (Auth::guest())
						<p></p>
						@else
						@if(Auth::user()->estado==1)
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ url('reportes/') }}">Reportes</a></li>
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ url('pedidos/') }}">Pedidos</a></li>
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ url('validado/registrar-empleado') }}">Registrar Empleados</a></li>
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ url('validado/representante/rol') }}">Roles de usuario</a></li>
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ url('carrito/') }}">Carrito</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ url('/post/') }}">Posts</a>
						</li>
						@elseif(Auth::user()->estado==0)
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ url('carrito/') }}">Carrito</a></li>
						<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{ url('pedidos/') }}">Mis Pedidos</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ url('/post/') }}">Posts</a>
						</li>
						@endif
						@endif
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
						<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('login') }}">{{ __('Login') }}</a></li>
						<li class="nav-item">
						<a class="nav-link" aria-current="page"  href="{{ route('register') }}">{{ __('Register') }}</a></li>
						@else
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Cuenta
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ url('/validado/representante/editar-perfil') }}">
								Actualizar perfil
								</a>
								<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
							</div>
						</li>
						
						@endif
				</ul>
				<!-- <form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form> -->
			</div>
   		</div>
	</nav> 

</header>
<!-- <div style="height:100rem;display:block;"></div> -->
	<div id="workshop-list">
	<article id="w1" class="workshop workshop-left">
		@yield('content')
	</article>
	<article id="w1" class="workshop workshop-right">
		@yield('content2')
	</article>
	</div>
    <footer class="footer   py-2 text-xs-center text-light bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-5">
				<h3>PRÓXIMOS CURSOS</h3>
				<ul id="next-workshops">
					<li><a href="/detail">Título del primer curso</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-6 col-md-offset-1">
				<h3>NO TE PIERDAS NUESTRAS NOVEDADES</h3>
				<form id="subscribe-form" action="">
					<div class="row">
						<div class="col-xs-7 col-sm-8">
							<div class="form-group">
								<label class="sr-only" for="email">tu correo electrónico</label>
								<input type="text" id="email" name="email" class="form-control input-lg" placeholder="tu correo electrónico">
							</div>
						</div>
						<div class="col-xs-5 col-sm-4">
							<button class="btn btn-secondary btn-lg">SUSCRIBIRME</button>
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
			<div class="col-xs-12 col-sm-5">
				<h3>SOBRE LOS WORKSHOPS</h3>
				<p>Estos workshps son el resultado de la suma de la ilusión y esfuerzos de <a href="#">Empresa</a>, <a href="#">Empresa 2</a> y <a href="#">Persona</a></p>
				<p>Una apuesta diferente al panorama formativo nacional aunando workshops de primer nivel, impartidos por reconocidos profesionales con una experiencia de fin de semana, en un entorno diferente. </p>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-6 col-md-offset-1">
				<h3>TE GUSTA? CORRE LA VOZ</h3>
				<p>Si te gusta esta filosofía de formación, o has acudido a uno de nuestros workshops y te hemos convencido, ayúdanos a promocionarlos por Internet para que otros puedan disfrutar de ellos:</p>
				<!-- Insertar addthis -->
			</div>
		</div>
	</div>
</footer>

     <!--Scripts-->
     @yield('scripts')
     <!-- jQuery first, then Tether, then Bootstrap JS. -->
	<script src="{{url('./js/jquery-1.12.4.min.js')}}"></script>
	<script src="{{url('./js/bootstrap.min.js')}}"></script>
</body>
</html>
