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
        $consulta = "SELECT * FROM clientes 
                 WHERE ('$txtBuscarNombre' = '' OR nombre LIKE '%$txtBuscarNombre%')";
        $resultado = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        $clientes = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $clientes[] = $fila;
        }
        return $clientes;
    }
}
