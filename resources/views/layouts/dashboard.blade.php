<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
</head>
<body class="grey lighten-3">
    @include('components.alerts')
	<!-- HEADER START -->
	<header>
		<nav class="navbar navbar-expand-lg white">
			<div class="container">
				<!-- Navbar brand -->
				<a class="navbar-brand grey-text" href="#fondo"><i class="fas fa-bolt cyan-text"></i> DevelUP</a>
				<!-- Collapse button -->
				<button class="navbar-toggler ml-2 mt-2 mr-0" type="button" data-toggle="collapse" data-target="#basicExampleNav"
				aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon fas fa-bars cyan-text"></span>
				</button>
				<!-- Collapsible content -->
				<div class="collapse navbar-collapse" id="basicExampleNav">
					<ul class="navbar-nav mr-auto"></ul>
					@if(Auth::user())
						<ul class="navbar-nav">
							<li class="nav-item">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">Opciones</a>
									<div class="dropdown-menu dropdown-primary z-depth-3" aria-labelledby="navbarDropdownMenuLink">
										<h5 class="dropdown-header text-center grey-text">Hola, {{Auth::user()->name}}</h5>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="fas fa-user-circle cyan-text mr-1 fa-fw "></i>Mi perfil</a>
										@if(Auth::user()->type == "Admin")
										<a class="dropdown-item" href="#"><i class="fas fa-clipboard-list cyan-text mr-1 fa-fw "></i>Orden de trabajo</a>
										<a class="dropdown-item" href="{{ url('/admin-profile/insumo') }}"><i class="fas fa-home cyan-text mr-1 fa-fw "></i>Bodega</a>
										<a class="dropdown-item" href="{{ url('/admin-profile/empleados') }}"><i class="fas fa-user-cog cyan-text mr-1 fa-fw "></i>Recursos humanos</a>
										@elseif(Auth::user()->type == "Cliente")
										<a class="dropdown-item" data-target="#modalCita" data-toggle="modal"><i class="fas fa-plus-circle cyan-text fa-fw "></i> Nueva cita</a>
										@endif
										<a class="dropdown-item" href="#"><i class="fas fa-edit cyan-text mr-1 fa-fw "></i>Actualizar datos</a>
										<div class="dropdown-divider"></div>
										<div class="container-fluid">
											<form action="{{ route('logout') }}" method="post" class="w-auto">
												{{ csrf_field() }}
												<button type="submit" class="btn btn-block btn-sm cyan white-text">Cerrar sesión</button>
											</form>
										</div>
									</div>
								</li>
							</li>
						</ul>
					@endif
				</div>
			<!-- Collapsible content -->	
			</div>
		</nav>
		<!--/.Navbar-->
	</header>	
	<!-- HEADER END -->	
    <div class="main">
		<div class="container">
			@yield('contenido')
		</div>
	</div>
	
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/js/mdb.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/js/mdb.min.js"></script>
            
	<!-- google maps -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClfElSCm1oarkG1XhX1Ac8vJ9tIFaYeVs"></script>
	<!-- google maps -->
	<script type="text/javascript" src="{{asset('js/scripts.js')}}" ></script>
	<script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>>
	<script>

		$('#message').modal('show')
		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '< Ant',
			nextText: 'Sig >',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
 		$.datepicker.setDefaults($.datepicker.regional['es']);
		$(function() {
			$("#datepicker").datepicker({ minDate: 0 });
		});

		$('.timepicker').timepicker({
			timeFormat: 'h:mm p',
			defaultTime: 'now +30',
			dynamic: true,
			dropdown: true,
			scrollbar: true
		});
	</script>
</body>
</html>