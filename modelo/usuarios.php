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
		$idInsertado = mysqli_insert_id($conexion);
		mysqli_close($conexion);
		return $idInsertado > 0 ? $idInsertado : 0;
	}
	// /****************************************************/
	// /****************************************************/
	public function obtenerUsuarios()
	{
		$conexion = $this->EjecutarConexion();
		// Consulta con filtro OR para nombre y username
		$consulta = "SELECT id_usuario, nombre, correo, username 
					FROM usuarios ORDER BY nombre";
		// Ejecutar la consulta
		$resultado = mysqli_query($conexion, $consulta);

		$usuarios = [];
		if ($resultado && mysqli_num_rows($resultado) > 0) {
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$usuarios[] = $fila;
			}
		}

		// Cerrar la conexión
		mysqli_close($conexion);
		return $usuarios;
	}

	public function obtenerUsuario($idUsuario)
	{
		$conexion = $this->EjecutarConexion();
		$consulta = "SELECT id_usuario, nombre, correo, username, password
					FROM usuarios WHERE  id_usuario = $idUsuario";
		$resultado = mysqli_query($conexion, $consulta);

		$usuarios = [];
		if ($resultado && mysqli_num_rows($resultado) > 0) {
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$usuarios[] = $fila;
			}
		}

		// Cerrar la conexión
		mysqli_close($conexion);

		return $usuarios;
	}

	public function actualizarUsuario($idUsuario, $username, $password, $nombre, $correo)
	{
		$conexion = $this->EjecutarConexion();

		// Construir la consulta
		$consulta = "UPDATE usuarios 
					 SET nombre = '$nombre',
						 username = '$username',
						 correo = '$correo',
						 password = '$password'
						WHERE id_usuario = $idUsuario";
		// Ejecutar la consulta
		$resultado = mysqli_query($conexion, $consulta);
		// Cerrar la conexión
		mysqli_close($conexion);

		return $resultado ? true : false;
	}
	// /****************************************************/
	// /****************************************************/
}
