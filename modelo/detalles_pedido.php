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
