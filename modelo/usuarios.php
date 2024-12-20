<?php
class usuarios
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
	public function registrarUsuario($nombre, $password, $username, $correo)
	{
		$conexion = $this->EjecutarConexion();
		$consulta = "INSERT INTO usuarios (nombre, password, username, correo) VALUES ('$nombre', '$password', '$username', '$correo')";
		mysqli_query($conexion, $consulta);
		$aciertos = mysqli_affected_rows($conexion);
		mysqli_close($conexion);
		return $aciertos > 0 ? 1 : 0;
	}
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
}
