<?php
class usuario
{
	private function EjecutarConexion()
	{
		include_once('conexion.php');
		$OBJConexion = new conexion;
		return $OBJConexion->ConectaBD();
	}

	/********************************************/
	public function verificarUser($username, $password)
	{
		$conexion = $this->EjecutarConexion();
		//$password = md5($password);  // Aunque usar MD5 no es seguro, sigue usándolo por tu lógica

		$consulta = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
		$resultado = mysqli_query($conexion, $consulta);
		$aciertos = mysqli_num_rows($resultado);
		mysqli_close($conexion);

		return ($aciertos == 1) ? 1 : 0;
	}
	/****************************************************/
	/****************************************************/
	public function ObtenerPrivilegiosUsuario($username)
	{
		$conexion = $this->EjecutarConexion();

		$consulta = "SELECT P.id_privilegio, P.nombre
                     FROM usuarios U
                     JOIN usuario_privilegios UP ON U.id_usuario = UP.id_usuario
                     JOIN privilegios P ON P.id_privilegio = UP.id_privilegio
                     WHERE U.username = '$username'";

		$resultado = mysqli_query($conexion, $consulta);
		$privilegios = [];
		while ($fila = mysqli_fetch_assoc($resultado)) {
			$privilegios[] = $fila;
		}

		mysqli_close($conexion);

		return $privilegios;
	}
	/****************************************************/
	/****************************************************/
	// public function regNewUser($newUser) // newUser  es vector
	// {
	// 	$this->EjecutarConexion();
	// 	$consulta = "INSERT INTO usuario VALUES ('$newUser[0]','$newUser[1]','$newUser[2]','$newUser[3]','$newUser[4]','$newUser[5]')";
	// 	$respuesta = mysql_query($consulta);
	// 	$aciertos = mysql_affected_rows();
	// 	mysql_close();
	// 	if ($aciertos == 1) {
	// 		return (1);
	// 	} else {
	// 		return (0);
	// 	}
	// }
	// /****************************************************/
	// /****************************************************/
	public function obtenerAllUsers()
	{
		$conexion = $this->EjecutarConexion();
		$consulta = " 	SELECT * FROM usuario ORDER BY apaterno,amaterno";
		$resultado = mysqli_query($conexion, $consulta);
		mysqli_close($conexion);
		$aciertos = mysqli_num_rows($resultado);
		if ($aciertos >= 1) {
			for ($i = 0; $i < $aciertos; $i++) {
				$filaEncontrada[$i] = mysqli_fetch_array($resultado);
			}
			return ($filaEncontrada);
		} else {
			return (0);
		}
	}
	// /****************************************************/
	// /****************************************************/
	// public function  obtenerDataUser($login)
	// {
	// 	$this->EjecutarConexion();
	// 	$consulta = " 	SELECT * FROM usuario WHERE login='$login'";
	// 	$resultado = mysql_query($consulta);
	// 	mysql_close();
	// 	$aciertos = mysql_num_rows($resultado);
	// 	if ($aciertos >= 1) {
	// 		for ($i = 0; $i < $aciertos; $i++) {
	// 			$filaEncontrada[$i] = mysql_fetch_array($resultado);
	// 		}
	// 		return ($filaEncontrada);
	// 	} else {
	// 		return (0);
	// 	}
	// }
	// /****************************************************/
	// /****************************************************/
	// public function actualizarUser($loginUser, $OldUser)
	// {
	// 	/*echo "password = ".$OldUser[0]."<br>";
	// 			echo "nombre = ".$OldUser[1]."<br>";
	// 			echo "patyernio = ".$OldUser[2]."<br>";
	// 			echo "materno = ".$OldUser[3]."<br>";
	// 			echo "esta = ".$OldUser[4]."<br>";
	// 			echo "login = ".$loginUser."<br>";*/
	// 	$this->EjecutarConexion();
	// 	$consulta = "UPDATE usuario SET password = '$OldUser[0]', nombre = '$OldUser[1]', apaterno = '$OldUser[2]',
	// 						 amaterno = '$OldUser[3]', estado = '$OldUser[4]' WHERE login = '$loginUser'";
	// 	//							 echo $consulta;
	// 	$respuesta = mysql_query($consulta);
	// 	$aciertos = mysql_affected_rows();
	// 	mysql_close();
	// 	if ($respuesta) {
	// 		return (1);
	// 	} else {
	// 		return (0);
	// 	}
	// }
	// /****************************************************/
	// /****************************************************/
	// public function ActualizarPassword($login, $password)
	// {
	// 	$this->EjecutarConexion();
	// 	$consulta = "UPDATE usuario SET password = '$password' WHERE login = '$login'";
	// 	$respuesta = mysql_query($consulta);
	// 	$aciertos = mysql_affected_rows();
	// 	mysql_close();
	// 	if ($respuesta) {
	// 		return (1);
	// 	} else {
	// 		return (0);
	// 	}
	// }
	// /*************************************************************/
	// public function DesactivarUsuario($UserDesactivar)
	// {
	// 	$this->EjecutarConexion();
	// 	$bandera = 1;
	// 	for ($i = 0; $i < count($UserDesactivar); $i++) {
	// 		$consulta = "UPDATE usuario SET estadoUsuario = 0 WHERE login = '$UserDesactivar[$i]'";
	// 		$resultado = mysql_query($consulta);
	// 		$aciertos = mysql_affected_rows();
	// 		if (!$resultado) {
	// 			$bandera = 0;
	// 			break;
	// 		}
	// 	}
	// 	mysql_close();
	// 	return ($bandera);
	// }
}
