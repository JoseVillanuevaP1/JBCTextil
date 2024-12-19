<?php
class controlLogin
{
	public function validarUsuario($login, $password)
	{
		include_once('../modelo/usuario.php');
		$OBJUser = new usuario;
		$validacion = $OBJUser->verificarUser($login, $password);
		if ($validacion == 1) {
			$privilegios =  $OBJUser->ObtenerPrivilegiosUsuario($login);
			if ($privilegios != 0) { //llama a menu
				include_once('formMenuUser.php');
				$OBJMenu = new formMenuUser;
				$OBJMenu->formMenuUserShow($login, $privilegios);
			} else {
				include_once('../compartido/mensajeSistema.php');
				$objMsj = new mensajeSistema;
				$objMsj->mensajeErrorShow("Error: Usuario sin privilegios o es un intento de acceso no permitido <br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
			}
		} else {
			include_once('../compartido/mensajeSistema.php');
			$objMsj = new mensajeSistema;
			$objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
		}
	}
}
