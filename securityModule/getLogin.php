<?php

if (isset($_POST['b_login']) and strlen($_POST['txt_user']) >= 5 and strlen($_POST['txt_password']) >= 4) {
	//include_once("../incClass/scripts.inc");
	$login = trim($_POST['txt_user']);
	$password = trim($_POST['txt_password']);
	include('controlLogin.php');
	$OBJControlLogin = new controlLogin;
	$OBJControlLogin->validarUsuario($login, $password);
} else {
	include_once('../incClass/formMensajeSistema.php');
	$objMsj = new formMensajeSistema;
	$objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>o los valores ingresados en la autenticacion no son validos <br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
}
