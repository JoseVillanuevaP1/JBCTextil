<?php
if (isset($_POST['retrocede']) and strcmp($_POST['login'], "") != 0) {
	$login = $_POST['login'];
	include_once('../modelo/usuario.php');
	$OBJUser = new usuario;
	$privilegios =  $OBJUser->ObtenerPrivilegiosUsuario($login);
	if ($privilegios != 0) {
		include_once('../moduloSeguridad/formMenuUser.php');
		$OBJMenu = new formMenuUser;
		$OBJMenu->formMenuUserShow($login, $privilegios);
	} else {
		include_once('../compartido/mensajeSistema.php');
		$objMsj = new mensajeSistema;
		$objMsj->mensajeErrorShow("Error: El usuario no tiene privilegios de acceso<br>existe un aborto de operacion <br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
	}
} else {
	include_once('../compartido/mensajeSistema.php');
	$objMsj = new mensajeSistema;
	$objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
}
