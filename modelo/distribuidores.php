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
	public function obtenerDistribuidores($txtBuscarNombre)
	{
		$conexion = $this->EjecutarConexion();
		$txtBuscarNombre = mysqli_real_escape_string($conexion, $txtBuscarNombre);
		$consulta = "SELECT * FROM distribuidores 
                 WHERE ('$txtBuscarNombre' = '' OR nombre LIKE '%$txtBuscarNombre%')";
		$resultado = mysqli_query($conexion, $consulta);
		mysqli_close($conexion);
		$distribuidores = [];
		while ($fila = mysqli_fetch_assoc($resultado)) {
			$distribuidores[] = $fila;
		}
		return $distribuidores;
	}
	/***************************************************************************************/
	public function obtenerDistribuidor($idDistribuidor)
	{
		$conexion = $this->EjecutarConexion();
		$consulta = "SELECT id_distribuidor, nombre, ruc,direccion, correo, telefono1, telefono2, telefono3
					FROM distribuidores WHERE id_distribuidor = $idDistribuidor";
		$resultado = mysqli_query($conexion, $consulta);

		$distribuidor = [];
		if ($resultado && mysqli_num_rows($resultado) > 0) {
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$distribuidor[] = $fila;
			}
		}

		// Cerrar la conexión
		mysqli_close($conexion);

		return $distribuidor;
	}
	/***************************************************************************************/
	public function editarDistribuidor($idDistribuidor, $nombre, $ruc, $direccion, $correo, $telefono1, $telefono2, $telefono3)
	{
		$conexion = $this->EjecutarConexion();

		// Construir la consulta
		$consulta = "UPDATE distribuidores 
					SET nombre = '$nombre',
                        ruc = '$ruc',
                        direccion = '$direccion',
                        correo = '$correo',
                        telefono1 = '$telefono1',
                        telefono2 = '$telefono2',
                       	telefono3 = '$telefono3'
				
						WHERE id_distribuidor = $idDistribuidor";
		// Ejecutar la consulta
		$resultado = mysqli_query($conexion, $consulta);
		// Cerrar la conexión
		mysqli_close($conexion);

		return $resultado ? true : false;
	}
	public function obtenerDistribuidoresPreventa()
	{
		$conexion = $this->EjecutarConexion();
		$consulta = "SELECT id_distribuidor, nombre FROM distribuidores";
		$resultado = mysqli_query($conexion, $consulta);
		mysqli_close($conexion);
		$distribuidores = [];
		while ($fila = mysqli_fetch_assoc($resultado)) {
			$distribuidores[] = $fila;
		}
		return $distribuidores;
	}
}
