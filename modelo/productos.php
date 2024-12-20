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
		public function obtenerProductos()
		{
			$conexion = $this->EjecutarConexion();
			// Consulta con filtro OR para nombre y username
			$consulta = "SELECT id_producto, nombre
						FROM productos ORDER BY nombre";
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
}
