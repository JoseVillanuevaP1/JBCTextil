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
    public function obtenerDetallesPedidoPreventa($id_pedido)
    {
        $conexion = $this->EjecutarConexion();
        $consulta = "SELECT
                        dp.id_detalle_pedido, 
                        dp.descripcion AS detalle_descripcion,
                        dp.cantidad AS detalle_cantidad,
                        pr.id_producto,
                        pr.nombre AS producto_nombre
                     FROM 
                        detalles_pedido dp  
                     JOIN 
                        productos pr ON dp.id_producto = pr.id_producto 
                     WHERE 
                        dp.id_pedido = $id_pedido";

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
}
