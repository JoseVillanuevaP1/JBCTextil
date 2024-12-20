<?php
class pedidos
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }

    public function registrarPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega, $txtFechaEmision, $txtEstado, $txtIdUsuario)
    {
        // Establecer la conexión a la base de datos
        $conexion = $this->EjecutarConexion();

        // Consulta SQL para insertar el nuevo pedido
        $consulta = "INSERT INTO pedidos (id_cliente, fecha_entrega, lugar_entrega, fecha_emision, estado, id_usuario) 
                     VALUES ($txtCliente, '$txtFechaEntrega', '$txtLugarEntrega', '$txtFechaEmision', '$txtEstado', $txtIdUsuario)";

        // Ejecutar la consulta
        mysqli_query($conexion, $consulta);
        $idInsertado = mysqli_insert_id($conexion);
        $aciertos = mysqli_affected_rows($conexion);
        mysqli_close($conexion);

        // Retornar el ID insertado si la inserción fue exitosa, sino 0
        return $aciertos > 0 ? $idInsertado : 0;
    }

    public function obtenerClientes()
    {
        $conexion = $this->EjecutarConexion();
        $consulta = "SELECT * FROM clientes";
        $resultado = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);

        $privilegios = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $privilegios[] = $fila;
        }

        return $privilegios;
    }
}
