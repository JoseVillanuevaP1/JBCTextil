<?php
class detalles_pedido
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }

    public function registrarDetallesPedido($idPedido, $arrayProductos)
    {
        $conexion = $this->EjecutarConexion();
        $valores = [];
        foreach ($arrayProductos as $productos) {
            $idProducto = $productos["idProducto"];
            $descripcion = $productos["descripcion"];
            $cantidad = $productos["cantidad"];

            $valores[] = "('$idPedido', $idProducto, '$descripcion', $cantidad)";
        }
        $consulta = "INSERT INTO detalles_pedido (id_pedido, id_producto, descripcion, cantidad) VALUES " . implode(', ', $valores);
        mysqli_query($conexion, $consulta);
        $aciertos = mysqli_affected_rows($conexion);
        mysqli_close($conexion);
        return $aciertos > 0 ? 1 : 0;
    }
    function obtenerDetallesPedido($idPedido)
    {
        $conexion = $this->EjecutarConexion();
        $consulta = "SELECT
                        dp.id_detalle_pedido, 
                        dp.descripcion AS detalle_descripcion,
                        dp.cantidad AS detalle_cantidad,
                        dp.id_producto,
                        pr.nombre AS producto_nombre
                     FROM 
                        detalles_pedido dp  
                     JOIN 
                        productos pr ON dp.id_producto = pr.id_producto 
                     WHERE 
                        dp.id_pedido = $idPedido";

        $resultado = mysqli_query($conexion, $consulta);
        $detallesPedido = [];
        if ($resultado) {
            while ($detalle = mysqli_fetch_assoc($resultado)) {
                $detallesPedido[] = $detalle;
            }
        }
        mysqli_close($conexion);
        return $detallesPedido;
    }

    public function obtenerDetallesPedidoPreventa($id_pedido)
    {
        $conexion = $this->EjecutarConexion();
        $consulta = "SELECT
                        dp.id_detalle_pedido, 
                        dp.descripcion AS detalle_descripcion,
                        dp.cantidad AS detalle_cantidad,
                        pr.id_producto,
                        pr.nombre AS producto_nombre,
                        SUM(rdp.precio) AS costo
                    FROM 
                        detalles_pedido dp  
                    JOIN 
                        productos pr ON dp.id_producto = pr.id_producto
                    JOIN
                        recursos_detalle_pedido rdp ON dp.id_detalle_pedido = rdp.id_detalle_pedido
                    WHERE 
                        dp.id_pedido = $id_pedido
                    GROUP BY 
                        dp.id_detalle_pedido";

        $resultado = mysqli_query($conexion, $consulta);
        $detallesPedido = [];
        if ($resultado) {
            while ($detalle = mysqli_fetch_assoc($resultado)) {
                $detallesPedido[] = $detalle;
            }
        }
        mysqli_close($conexion);
        return $detallesPedido;
    }

    public function obtenerDetallePedidoPreventa($idDetallePedido)
    {
        $conexion = $this->EjecutarConexion();
        $consulta = "SELECT
                        dp.id_detalle_pedido,  
                        dp.descripcion,
                        dp.cantidad,
                        p.nombre
                    FROM 	
                        detalles_pedido dp
                    JOIN
                        productos p ON dp.id_producto = p.id_producto
                    WHERE dp.id_detalle_pedido = $idDetallePedido";
        $resultado = mysqli_query($conexion, $consulta);

        $detallePedido = [];
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $detallePedido = $fila;
            }
        }

        mysqli_close($conexion);
        return $detallePedido;
    }

    public function editarDetallesPedido($idPedido, $arrayProductos)
    {
        $conexion = $this->EjecutarConexion();
        $aciertos = 0;
        $detallesExistentes = [];
        $consulta = "SELECT id_detalle_pedido FROM detalles_pedido WHERE id_pedido = '$idPedido'";
        $resultados = mysqli_query($conexion, $consulta);
        while ($detalle = mysqli_fetch_assoc($resultados)) {
            $detallesExistentes[$detalle['id_detalle_pedido']] = true;
        }

        $valores = [];
        foreach ($arrayProductos as $producto) {
            $idDetallePedido = $producto["id_detalle_pedido"] ?? null;
            $idProducto = $producto["idProducto"];
            $descripcion = $producto["descripcion"];
            $cantidad = $producto["cantidad"];

            if ($idDetallePedido == null) {
                $valores[] = "('$idPedido', '$idProducto', '$descripcion', '$cantidad')";
            } else {
                $consultaUpdate = "
                UPDATE detalles_pedido 
                SET id_producto = '$idProducto', descripcion = '$descripcion', cantidad = '$cantidad'
                WHERE id_detalle_pedido = '$idDetallePedido';
            ";
                mysqli_query($conexion, $consultaUpdate);
                $aciertos++;
            }
        }

        if (!empty($valores)) {
            $consultaInsert = "INSERT INTO detalles_pedido (id_producto, descripcion, cantidad) VALUES " . implode(', ', $valores);
            mysqli_query($conexion, $consultaInsert);
            $aciertos += mysqli_affected_rows($conexion);
        }

        foreach ($detallesExistentes as $idDetalleExistente => $value) {
            if (!in_array($idDetalleExistente, array_column($arrayProductos, 'id_detalle_pedido'))) {
                $consultaDelete = "DELETE FROM detalles_pedido WHERE id_detalle_pedido = '$idDetalleExistente'";
                mysqli_query($conexion, $consultaDelete);
                $aciertos++;
            }
        }

        mysqli_close($conexion);
        return $aciertos > 0 ? 1 : 0;
    }
    function actualizarDetallesPedido($arrayActualizar)
    {
        $conexion = $this->EjecutarConexion();

        foreach ($arrayActualizar as $detalle) {
            $id_detalle_pedido = $detalle['id_detalle_pedido'];
            $costo_unitario = $detalle['costo_unitario'];

            // Consulta para actualizar el campo 'costo_unitario' en la tabla 'detalles_pedido'
            $consulta = "UPDATE detalles_pedido 
                         SET costo_unitario = $costo_unitario 
                         WHERE id_detalle_pedido = $id_detalle_pedido";

            // Ejecutar la consulta
            mysqli_query($conexion, $consulta);
        }

        mysqli_close($conexion);
    }
}
