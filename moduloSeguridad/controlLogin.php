<?php
class controlLogin
{
	public function validarUsuario($login, $password)
	{
		include_once('../modelo/usuarios.php');
		$OBJUser = new usuarios;
		$idUsuario = $OBJUser->verificarUser($login, $password);
		if ($idUsuario != 0) {
			$privilegios =  $OBJUser->ObtenerPrivilegiosUsuario($login);
			if (count($privilegios) != 0) {
				session_start();
				$_SESSION["privilegios"] = $privilegios;
				$_SESSION["idUsuario"] = $idUsuario;
				include_once('formMenuUser.php');
				$OBJMenu = new formMenuUser;
				$OBJMenu->formMenuUserShow($login, $privilegios);
			} else {
				include_once('../compartido/mensajeSistema.php');
				$objMsj = new mensajeSistema;
				$objMsj->mensajeSistemaShow("Error: Usuario sin privilegios o es un intento de acceso no permitido <br>",'../index.php');
			}
		} else {
			include_once('../compartido/mensajeSistema.php');
			$objMsj = new mensajeSistema;
			$objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", '../index.php');
		}
	}
}
