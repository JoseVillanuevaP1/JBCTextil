<?php

if (isset($_POST['b_login']) and strlen($_POST['txt_user']) >= 5 and strlen($_POST['txt_password']) >= 4) {
	//include_once("../compartido/scripts.inc");
	$login = trim($_POST['txt_user']);
	$password = trim($_POST['txt_password']);
	include('controlLogin.php');
	$OBJControlLogin = new controlLogin;
	$OBJControlLogin->validarUsuario($login, $password);
} else {
	include_once('../compartido/mensajeSistema.php');
	$objMsj = new mensajeSistema;
	$objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>o los valores ingresados en la autenticacion no son validos <br>", "../index.php");
}
