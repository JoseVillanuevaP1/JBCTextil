<?php
class controlLogin
{
	public function validarUsuario($login, $password)
	{
		include_once('../entities/userEntity.php');
		$OBJUser = new userEntity;
		$validacion = $OBJUser->verificarUser($login, $password);
		if ($validacion == 1) {
			$privilegios =  $OBJUser->ObtenerPrivilegiosUsuario($login);
			if ($privilegios != 0) { //llama a menu
				include_once('formMenuUser.php');
				$OBJMenu = new formMenuUser;
				$OBJMenu->formMenuUserShow($login, $privilegios);
			} else {
				include_once('../incClass/formMensajeSistema.php');
				$objMsj = new formMensajeSistema;
				$objMsj->mensajeErrorShow("Error: Usuario sin privilegios o es un intento de acceso no permitido <br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
			}
		} else {
			include_once('../incClass/formMensajeSistema.php');
			$objMsj = new formMensajeSistema;
			$objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
		}
	}
}
