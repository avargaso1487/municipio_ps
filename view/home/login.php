<?php 
	session_start();
	if (isset($_SESSION['usuario']))
	{
		header("Location:home.php");
	} else {
?>

<!DOCTYPE html>
<html class="gt-ie8 gt-ie9 not-ie"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>MUNICIPIO PS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<!-- Open Sans font from Google CDN -->
	<link href="../../assets/stylesheets/fonts.css" rel="stylesheet" type="text/css">
	<link href="../../assets/stylesheets/modulos.css" rel="stylesheet" type="text/css">

	<!-- Pixel Admin's stylesheets -->
	<link href="../../assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
	
	<link href="../../assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
	
	<link href="../../assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
	<script src="assets/javascripts/ie.min.js"></script>
	<![endif]-->
</head>


<body class="theme-default page-signin">
	
	<div id="page-signin-bg">		
		<div class="overlay"></div>		
		<img src="../../assets/demo/signin-bg-1.jpg" alt="">
	</div>

	<div class="signin-container">	
		<div class="signin-info">
			<!--LOGO-->
			<img  src="../../image/logo.png" alt="">
		</div>

		<div class="signin-form">			
			<form action="POST" id="form-login">
				<div class="signin-text">
					<span>Iniciar Sesión</span>
				</div> 
				<div class="form-group w-icon">
					<input type="text" name="usuario" id="usuario" class="form-control input-lg" placeholder="Usuario" autocomplete="off">
					<span class="fa fa-user signin-form-icon"></span>
				</div> 
				<div class="form-group w-icon">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña">
					<span class="fa fa-lock signin-form-icon"></span>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-block btn-primary" style="padding: 10px 0 10px 0;">
						INGRESAR <span><i class="fa fa-sign-in" style="margin-left: 10px;"></i></span>
					</button>
				</div> 
			</form>				
		</div>		
	</div>

	<div class="not-a-member">
		<b>BSE</b> 2016 &copy; All Rights Reserved
	</div>

<!-- Pixel Admin's javascripts -->
	<script src="../../assets/javascripts/jquery.min.js"></script>
	<script src="../../assets/javascripts/jquery.noty.js"></script>
	<script src="../../assets/javascripts/bootstrap.min.js"></script>	
	<script src="../../assets/javascripts/bootstrapValidator.min.js"></script>
	<script src="../../assets/javascripts/validarLogin.js" ></script>	
</body>
</html>

<?php 
	}
?>