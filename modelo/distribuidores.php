<?php
class distribuidores
{
	private function EjecutarConexion()
	{
		include_once('conexion.php');
		$OBJConexion = new conexion;
		return $OBJConexion->ConectaBD();
	}
	/***************************************************************************************/
	public function registrarDistribuidor($nombre, $RUC, $Direccion, $Correo, $Telefono1, $Telefono2, $Telefono3)
	{
		$conexion = $this->EjecutarConexion();
		$consulta = "INSERT INTO distribuidores (nombre, ruc, direccion, correo, telefono1, telefono2, telefono3) VALUES ('$nombre','$RUC','$Direccion','$Correo','$Telefono1','$Telefono2','$Telefono3')";
		mysqli_query($conexion, $consulta);
		$aciertos = mysqli_affected_rows($conexion);
		mysqli_close($conexion);
		return $aciertos > 0 ? 1 : 0;
	}
	/***************************************************************************************/
}
