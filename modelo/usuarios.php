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
		// Realizar la conexión
		$conexion = $this->EjecutarConexion();
		$consulta = "SELECT id_usuario FROM usuarios WHERE username = '$username' AND password = '$password'";
		$resultado = mysqli_query($conexion, $consulta);

		// Comprobar si se encontraron resultados
		if ($acierto = mysqli_fetch_assoc($resultado)) {
			$id_usuario = $acierto['id_usuario'];
		} else {
			$id_usuario = 0;
		}
		mysqli_close($conexion);
		return $id_usuario;
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
	public function obtenerUsuarios($txtBuscarNombre, $txtBuscarUsername)
	{
		$conexion = $this->EjecutarConexion();
		$consulta = "SELECT id_usuario, nombre, correo, username FROM usuarios";
		$filtros = [];
		if (!empty($txtBuscarNombre)) {
			$filtros[] = "nombre LIKE '%" . mysqli_real_escape_string($conexion, $txtBuscarNombre) . "%'";
		}
		if (!empty($txtBuscarUsername)) {
			$filtros[] = "username LIKE '%" . mysqli_real_escape_string($conexion, $txtBuscarUsername) . "%'";
		}
		if (!empty($filtros)) {
			$consulta .= " WHERE " . implode(' AND ', $filtros);
		}
		$consulta .= " ORDER BY nombre";
		$resultado = mysqli_query($conexion, $consulta);
		$usuarios = [];
		if ($resultado && mysqli_num_rows($resultado) > 0) {
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$usuarios[] = $fila;
			}
		}
		mysqli_close($conexion);
		return $usuarios;
	}

	public function obtenerUsuario($idUsuario)
	{
		$conexion = $this->EjecutarConexion();
		$consulta = "SELECT id_usuario, nombre, correo, username, password
					FROM usuarios WHERE id_usuario = $idUsuario";
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

	public function actualizarUsuario($idUsuario, $username, $password, $nombre, $correo, $nuevosPrivilegios)
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
		//privilegios
		$consultaEliminarPrivilegios = "DELETE FROM usuario_privilegios WHERE id_usuario = $idUsuario";
		mysqli_query($conexion, $consultaEliminarPrivilegios);

		// Insertar nuevos privilegios
		foreach ($nuevosPrivilegios as $idprivilegio) {
			$consultaInsertarPrivilegio = "INSERT INTO usuario_privilegios (id_usuario, id_privilegio) 
										VALUES ($idUsuario, '$idprivilegio')";
			mysqli_query($conexion, $consultaInsertarPrivilegio);
		}

		// Cerrar la conexión
		mysqli_close($conexion);

		return $resultado ? true : false;
	}
	// /****************************************************/
	// /****************************************************/
}
