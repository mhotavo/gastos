<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<title>
		Gastos
	</title>
	<link rel="icon" href="<?=base_url()?>public/images/icono.png"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
	<link rel="stylesheet" href="<?=base_url()?>public/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?=base_url()?>public/css/fontawesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?=base_url()?>public/css/AdminLTE.min.css"/>
	<link rel="stylesheet" href="<?=base_url()?>public/css/skins/_all-skins.min.css"/>
	<script src="<?=base_url()?>public/js/generales.js"></script>
	<style type="text/css">
		.login-page, .register-page {background-color: #1BB538;}
	</style>
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="">
				<b>
					Gastos <i class="fa fa-bar-chart" aria-hidden="true"></i>
				</b>
				<i class="fa fa-user-o" aria-hidden="true">
				</i>
				<br/>
			</a>
		</a>
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">
			Iniciar Sesion
		</p>
		<form accept-charset="UTF-8" method="POST" action="<?= base_url()?>login/form">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" required/>
				<span class="fa fa-user form-control-feedback">
				</span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Contraseña" id="contrasena" name="contrasena" required/>
				<span class="fa fa-lock form-control-feedback">
				</span>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label>
							<input type="checkbox" id="session_login"/>
							Recordarme
						</label>
					</div>
				</div>
				<div class="col-md-4">
					<input type="submit" class="btn btn-success btn-block btn-flat" name="" value="Ingresar">

				</div>
			</div>
		</form>

	</div>
</div>
</div>
<script src="<?=base_url()?>public/js/jquery.min.js"></script>
<script src="<?=base_url()?>public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
