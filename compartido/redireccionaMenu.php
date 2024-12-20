<?php
if (isset($_POST['retrocede']) and strcmp($_POST['login'], "") != 0) {
	$login = $_POST['login'];
	include_once('../modelo/usuario.php');
	$OBJUser = new usuarios;
	$privilegios =  $OBJUser->ObtenerPrivilegiosUsuario($login);
	if ($privilegios != 0) {
		include_once('../moduloSeguridad/formMenuUser.php');
		$OBJMenu = new formMenuUser;
		$OBJMenu->formMenuUserShow($login, $privilegios);
	} else {
		include_once('../compartido/mensajeSistema.php');
		$objMsj = new mensajeSistema;
		$objMsj->mensajeSistemaShow("Error: El usuario no tiene privilegios de acceso<br>existe un aborto de operacion <br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
	}
} else {
	include_once('../compartido/mensajeSistema.php');
	$objMsj = new mensajeSistema;
	$objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", '../index.php');
}
