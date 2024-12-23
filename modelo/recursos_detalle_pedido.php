<?php
class recursos_detalle_preventa
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }
    /***************************************************************************************/
    /***************************************************************************************/
    public function obtenerRecursosDetallePedido($idDetallePedido)
    {
        $conexion = $this->EjecutarConexion();
        $idDetallePedido = intval($idDetallePedido);

        $consulta = "SELECT id_recurso_detalle_pedido, id_detalle_pedido, id_recurso, id_distribuidor, precio
                 FROM recursos_detalle_pedido 
                 WHERE id_detalle_pedido = $idDetallePedido";

        $resultado = mysqli_query($conexion, $consulta);
        $recursos = $resultado && mysqli_num_rows($resultado) > 0
            ? mysqli_fetch_all($resultado, MYSQLI_ASSOC)
            : [];

        mysqli_close($conexion);
        return $recursos;
    }
    public function eliminarRecursosPreventa($arrayEliminar)
    {
        $conn = $this->EjecutarConexion();

        if (empty($arrayEliminar)) {
            return false;
        }

        // Escapar valores y crear la consulta
        $ids = implode(',', array_map('intval', $arrayEliminar));
        $sql = "DELETE FROM recursos_detalle_pedido WHERE id_recurso_detalle_pedido IN ($ids)";

        // Ejecutar la consulta
        if ($conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarRecursosPreventa($arrayActualizar)
    {
        $conn = $this->EjecutarConexion();

        foreach ($arrayActualizar as $recurso) {
            $idRecursoDetallePedido = intval($recurso['id_recurso_detalle_pedido']);
            $idRecurso = intval($recurso['id_recurso']);
            $idDetallePedido = intval($recurso['id_detalle_pedido']);
            $idDistribuidor = intval($recurso['id_distribuidor']);
            $precio = $conn->real_escape_string($recurso['precio']); // Usar real_escape_string para evitar inyección de SQL

            $sql = "UPDATE recursos_detalle_pedido 
                    SET id_detalle_pedido = $idDetallePedido,
                        id_recurso = $idRecurso, 
                        id_distribuidor = $idDistribuidor, 
                        precio = '$precio' 
                    WHERE id_recurso_detalle_pedido = $idRecursoDetallePedido";

            if (!$conn->query($sql)) {
                return false;  // Si hay un error en cualquier consulta
            }
        }

        return true;
    }

    public function insertarRecursosPreventa($arrayInsertar)
    {
        $conn = $this->EjecutarConexion();

        foreach ($arrayInsertar as $recurso) {
            $idRecurso = intval($recurso['id_recurso']);
            $idDetallePedido = intval($recurso['id_detalle_pedido']);
            $idDistribuidor = intval($recurso['id_distribuidor']);
            $precio = $conn->real_escape_string($recurso['precio']);

            $sql = "INSERT INTO recursos_detalle_pedido (id_recurso, id_detalle_pedido, id_distribuidor, precio) 
                    VALUES ($idRecurso, $idDetallePedido, $idDistribuidor, '$precio')";

            if (!$conn->query($sql)) {
                return false;
            }
        }

        return true;
    }
}
