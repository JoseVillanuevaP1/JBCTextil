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

    public function obtenerPedidos($txtBuscarCliente, $txtBuscarDesde, $txtBuscarHasta, $txtBuscarEstado)
    {
        // Establecer la conexión a la base de datos
        $conexion = $this->EjecutarConexion();

        // Consulta SQL para obtener los pedidos
        $consulta = "SELECT 
                        p.id_pedido,
                        p.fecha_emision,
                        CONCAT(c.nombre, ' ', c.apellido) AS cliente,
                        p.estado
                     FROM 
                        pedidos p
                     JOIN
                        clientes c ON p.id_cliente = c.id_cliente
                    WHERE
                        p.fecha_emision BETWEEN '$txtBuscarDesde' AND '$txtBuscarHasta'
                        AND ('$txtBuscarCliente' = '' OR CONCAT(c.nombre, ' ', c.apellido) LIKE '%$txtBuscarCliente%')
                        AND ('$txtBuscarEstado' = '' OR p.estado LIKE '%$txtBuscarEstado%');";
        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
            // Crear un array para almacenar los resultados
            $pedidos = [];

            // Recorrer los resultados y agregarlos al array
            while ($row = mysqli_fetch_assoc($resultado)) {
                $pedidos[] = $row;
            }

            // Cerrar la conexión
            mysqli_close($conexion);
            return $pedidos;
        } else {
            mysqli_close($conexion);
            return [];
        }
    }
    public function obtenerPedidoPreventa($id_pedido)
    {
        // Establecer la conexión a la base de datos
        $conexion = $this->EjecutarConexion();
        $consulta = "SELECT
                        CONCAT(c.nombre, ' ' ,c.apellido) AS cliente,
                        c.documento,
                        c.correo_electronico,
                        c.direccion,
                        c.telefono 
                     FROM
                        pedidos p
                     JOIN 
                        clientes c ON c.id_cliente = p.id_cliente
                     WHERE 
                        p.id_pedido = $id_pedido";

        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $consulta);
        $pedidoPreventa = [];
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtener el resultado como un array asociativo
            $pedidoPreventa = mysqli_fetch_assoc($resultado);
        }
        mysqli_close($conexion);
        return $pedidoPreventa;
    }
}
