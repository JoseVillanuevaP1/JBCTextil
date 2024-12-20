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
}
