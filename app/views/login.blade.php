<!DOCTYPE html>
<html>
	<head>
		<title>Entrar :: LampFitness </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		{{ HTML::style('bs3/css/bootstrap.min.css') }}
		{{ HTML::style('css/style-responsive.css') }}
		{{ HTML::style('css/atom-style.css') }}
		{{ HTML::style('css/font-awesome.min.css') }}
		{{ HTML::style('plugins/PCharts/style.css') }}
		{{ HTML::style('plugins/kalendar/kalendar.css') }}

		<link rel="icon" type="image/x-icon" href="/favicon.ico" />

		@yield('css')
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	          {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
	          {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
	    <![endif]-->
	</head>
	<body>
		<div class="container login-bg">

			<form action="/login" method="post" class="login-form-signin">
				<div class="login-logo"><img src="images/logo.png"></div>
				<h2 class="login-form-signin-heading">Iniciar Sesión</h2>
				<div class="login-wrap">
					<input type="text" autofocus name="username" placeholder="Usuario" class="form-control">
					<input type="password" name="password" placeholder="Contraseña" class="form-control">

					<button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>
				</div>
			</form>
		</div>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
		<script src="js/jquery-1.10.2.js"></script> 
		<!-- Include all compiled plugins (below), or include individual files as needed --> 
		<script src="bs3/js/bootstrap.min.js"></script>
	</body>
</html>