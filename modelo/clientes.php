<?php
class clientes
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }

    public function registrarCliente($txtNombreCliente, $txtApellidoCliente, $intTipoDocumento, $intDocumento, $intTelefonoCliente, $txtCorreoCliente, $txtDireccionCliente)
    {
        $conexion = $this->EjecutarConexion();

        $consulta = "INSERT INTO clientes (nombre, apellido, documento, id_tipo_documento, telefono, correo_electronico, direccion) VALUES ('$txtNombreCliente', '$txtApellidoCliente', '$intDocumento', '$intTipoDocumento','$intTelefonoCliente', '$txtCorreoCliente', '$txtDireccionCliente')";
        mysqli_query($conexion, $consulta);
        $aciertos = mysqli_affected_rows($conexion);
        mysqli_close($conexion);
        return $aciertos > 0 ? 1 : 0;
    }
    public function obtenerClientes($txtBuscarNombre)
    {
        $conexion = $this->EjecutarConexion();
        $txtBuscarNombre = mysqli_real_escape_string($conexion, $txtBuscarNombre);
        $consulta = "SELECT 
        id_cliente, 
        nombre, 
        apellido,
        documento,
        id_tipo_documento,
        telefono,
        correo_electronico,
        direccion 
        FROM 
        clientes 
        WHERE ('$txtBuscarNombre' = '' OR nombre LIKE '%$txtBuscarNombre%')";
        $resultado = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        $clientes = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $clientes[] = $fila;
        }
        return $clientes;
    }
    public function obtenerCliente($idCliente)
	{
		$conexion = $this->EjecutarConexion();
		$consulta = "SELECT 
                    id_cliente, 
                    nombre, 
                    apellido,
                    documento,
                    id_tipo_documento,
                    telefono,
                    correo_electronico,
                    direccion
					FROM 
                    clientes 
                    WHERE 
                    id_cliente = $idCliente";
		$resultado = mysqli_query($conexion, $consulta);

		$clientes = [];
		if ($resultado && mysqli_num_rows($resultado) > 0) {
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$clientes[] = $fila;
			}
		}

		// Cerrar la conexión
		mysqli_close($conexion);

		return $clientes;
	}

	public function editarCliente($idCliente, $nombre, $apellido, $id_tipo_documento, $documento, $telefono, $correo_electronico, $direccion)
	{
		$conexion = $this->EjecutarConexion();

		// Construir la consulta
		$consulta = "UPDATE clientes 
					SET nombre = '$nombre',
                        apellido = '$apellido',
                        id_tipo_documento = '$id_tipo_documento',
                        documento = '$documento',
                        telefono = '$telefono',
                        correo_electronico = '$correo_electronico',
                        direccion = '$direccion'
				
						WHERE id_cliente = $idCliente";
		// Ejecutar la consulta
		$resultado = mysqli_query($conexion, $consulta);
		// Cerrar la conexión
		mysqli_close($conexion);

		return $resultado ? true : false;
	}
    public function obtenerClientesPedido()
    {
        $conexion = $this->EjecutarConexion();
        
        $consulta = "SELECT * FROM clientes";
        $resultado = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        $clientes = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $clientes[] = $fila;
        }
        return $clientes;
    }
}
