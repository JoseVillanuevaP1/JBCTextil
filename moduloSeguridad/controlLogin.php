<?php
class controlLogin
{
	public function validarUsuario($login, $password)
	{
		include_once('../modelo/usuarios.php');
		$OBJUser = new usuarios;
		$validacion = $OBJUser->verificarUser($login, $password);
		if ($validacion == 1) {
			$privilegios =  $OBJUser->ObtenerPrivilegiosUsuario($login);
			if (count($privilegios) != 0) {
				session_start();
				$_SESSION["privilegios"] = $privilegios;
				include_once('formMenuUser.php');
				$OBJMenu = new formMenuUser;
				$OBJMenu->formMenuUserShow($login, $privilegios);
			} else {
				include_once('../compartido/mensajeSistema.php');
				$objMsj = new mensajeSistema;
				$objMsj->mensajeSistemaShow("Error: Usuario sin privilegios o es un intento de acceso no permitido <br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
			}
		} else {
			include_once('../compartido/mensajeSistema.php');
			$objMsj = new mensajeSistema;
			$objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
		}
	}
}
