<?php
class productos
{
    private function EjecutarConexion()
		{
			include_once('conexion.php');			
			$OBJConexion = new conexion;
			return $OBJConexion -> ConectaBD();
		}
	/***************************************************************************************/ 
	public function registrarProducto($nombre)
		{
			$conexion = $this->EjecutarConexion();
			$consulta = "INSERT INTO productos (nombre) VALUES ('$nombre')";
			mysqli_query($conexion, $consulta);
			$aciertos = mysqli_affected_rows($conexion);
			mysqli_close($conexion);
			return $aciertos > 0 ? 1 : 0;
		}
	/***************************************************************************************/ 	
		public function obtenerProductos($txtBuscarNombreProducto)
		{
			$conexion = $this->EjecutarConexion();
			$txtBuscarNombreProducto = mysqli_real_escape_string($conexion, $txtBuscarNombreProducto);
			// Consulta con filtro OR para nombre y username
			$consulta = "SELECT id_producto, nombre
						FROM productos
						WHERE ('$txtBuscarNombreProducto' = '' OR nombre LIKE '%$txtBuscarNombreProducto%')";
			// Ejecutar la consulta
			$resultado = mysqli_query($conexion, $consulta);
	
			$productos = [];
			if ($resultado && mysqli_num_rows($resultado) > 0) {
				while ($fila = mysqli_fetch_assoc($resultado)) {
					$productos[] = $fila;
				}
			}
			// Cerrar la conexión
			mysqli_close($conexion);
			return $productos;
		}

	public function obtenerProducto($idProducto)
	{
		$conexion = $this->EjecutarConexion();
		$consulta = "SELECT id_producto, nombre
					FROM productos WHERE id_producto = $idProducto";
		$resultado = mysqli_query($conexion, $consulta);

		$productos = [];
		if ($resultado && mysqli_num_rows($resultado) > 0) {
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$productos[] = $fila;
			}
		}

		// Cerrar la conexión
		mysqli_close($conexion);

		return $productos;
	}

	public function editarProducto($idProducto, $nombre)
	{
		$conexion = $this->EjecutarConexion();

		// Construir la consulta
		$consulta = "UPDATE productos 
					 SET nombre = '$nombre'
				
						WHERE id_producto = $idProducto";
		// Ejecutar la consulta
		$resultado = mysqli_query($conexion, $consulta);
		// Cerrar la conexión
		mysqli_close($conexion);

		return $resultado ? true : false;
	}
}
