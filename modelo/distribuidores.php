<?php
class distribuidores
{
    private function EjecutarConexion()
		{
			include_once('conexion.php');			
			$OBJConexion = new conexion;
			return $OBJConexion -> ConectaBD();
		}
	/***************************************************************************************/ 
	public function registrarDistribuidor($nombre,$RUC,$Direccion,$Correo,$Telefono1,$Telefono2,$Telefono3)
		{
			$conexion = $this->EjecutarConexion();
			$consulta = "INSERT INTO distribuidores (nombre, ruc, direccion, correo, telefono1, telefono2, telefono3) VALUES ('$nombre','$RUC','$Direccion','$Correo','$Telefono1','$Telefono2','$Telefono3')";
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
