<?php
class pedidos
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }
 
    public function cambiarEstadoPedidoPorCotizacion($idCotizacion)
    {
        // Realizar la conexión
        $conexion = $this->EjecutarConexion();
    
        // Preparar la consulta SQL para actualizar el estado del pedido
        $consulta = "UPDATE pedidos 
                     SET estado = 'pagado' 
                     WHERE id_pedido = (
                         SELECT id_pedido 
                         FROM cotizaciones 
                         WHERE id_cotizacion = ?
                     )";
    
        // Usar sentencias preparadas
        $stmt = mysqli_prepare($conexion, $consulta);
    
        if ($stmt) {
            // Vincular los parámetros (i para integer)
            mysqli_stmt_bind_param($stmt, 'i', $idCotizacion);
    
            // Ejecutar la consulta
            mysqli_stmt_execute($stmt);
    
            // Verificar si se afectó alguna fila
            $aciertos = mysqli_stmt_affected_rows($stmt);
    
            // Cerrar la consulta preparada
            mysqli_stmt_close($stmt);
        } else {
            $aciertos = 0;
        }
    
        // Cerrar la conexión
        mysqli_close($conexion);
    
        // Retornar 1 si se actualizó al menos una fila, 0 en caso contrario
        return $aciertos > 0 ? 1 : 0;
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
        $conexion = $this->EjecutarConexion();

        // Sanitizar las entradas
        $txtBuscarCliente = mysqli_real_escape_string($conexion, $txtBuscarCliente);
        $txtBuscarDesde = mysqli_real_escape_string($conexion, $txtBuscarDesde);
        $txtBuscarHasta = mysqli_real_escape_string($conexion, $txtBuscarHasta);
        $txtBuscarEstado = mysqli_real_escape_string($conexion, $txtBuscarEstado);

        // Iniciar la consulta básica
        $consulta = "SELECT 
                    p.id_pedido,
                    p.fecha_emision,
                    CONCAT(c.nombre, ' ', c.apellido) AS cliente,
                    p.estado
                 FROM 
                    pedidos p
                 JOIN
                    clientes c ON p.id_cliente = c.id_cliente
                 WHERE 1";

        // Filtro por cliente
        if (!empty($txtBuscarCliente)) {
            $consulta .= " AND CONCAT(c.nombre, ' ', c.apellido) LIKE '%$txtBuscarCliente%'";
        }

        // Filtro por fecha desde
        if (!empty($txtBuscarDesde)) {
            $consulta .= " AND p.fecha_emision >= '$txtBuscarDesde'";
        }

        // Filtro por fecha hasta
        if (!empty($txtBuscarHasta)) {
            $consulta .= " AND p.fecha_emision <= '$txtBuscarHasta'";
        }

        // Filtro por estado
        if (!empty($txtBuscarEstado)) {
            $consulta .= " AND p.estado LIKE '%$txtBuscarEstado%'";
        }

        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si se obtienen resultados
        if ($resultado) {
            $pedidos = [];
            while ($row = mysqli_fetch_assoc($resultado)) {
                $pedidos[] = $row;
            }
            mysqli_close($conexion);
            return $pedidos;
        } else {
            mysqli_close($conexion);
            return [];
        }
    }
    function obtenerPedido($idPedido)
    {
        $conexion = $this->EjecutarConexion($idPedido);
        $consulta = "SELECT
                        p.id_pedido,
                        p.id_cliente,
                        p.fecha_entrega,
                        p.lugar_entrega
                     FROM
                        pedidos p
                     JOIN 
                        clientes c ON c.id_cliente = p.id_cliente
                     WHERE 
                        p.id_pedido = $idPedido";

        $resultado = mysqli_query($conexion, $consulta);
        $pedido = [];
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $pedido = mysqli_fetch_assoc($resultado);
        }
        mysqli_close($conexion);
        return $pedido;
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
    function editarPedido()
    {
        return 1;
    }

    public function obtenerPedidosCotizados($txtBuscarCliente, $txtBuscarDesde, $txtBuscarHasta)
    {
        $conexion = $this->EjecutarConexion();

        // Sanitizar las entradas
        $txtBuscarCliente = mysqli_real_escape_string($conexion, $txtBuscarCliente);
        $txtBuscarDesde = mysqli_real_escape_string($conexion, $txtBuscarDesde);
        $txtBuscarHasta = mysqli_real_escape_string($conexion, $txtBuscarHasta);

        // Iniciar la consulta básica
        $consulta = "SELECT 
                        CONCAT(c.nombre, ' ', c.apellido) AS nombre_cliente,
                        p.id_pedido,
                        p.fecha_emision,
                        p.estado,
                        co.precio_final,
                        co.id_cotizacion
                    FROM 
                        pedidos p
                    JOIN 
                        clientes c ON p.id_cliente = c.id_cliente
                    JOIN 
                        cotizaciones co ON p.id_pedido = co.id_pedido
                    WHERE 
                        p.estado = 'cotizado'";

        // Filtro por cliente
        if (!empty($txtBuscarCliente)) {
            $consulta .= " AND CONCAT(c.nombre, ' ', c.apellido) LIKE '%$txtBuscarCliente%'";
        }

        // Filtro por fecha desde
        if (!empty($txtBuscarDesde)) {
            $consulta .= " AND p.fecha_emision >= '$txtBuscarDesde'";
        }

        // Filtro por fecha hasta
        if (!empty($txtBuscarHasta)) {
            $consulta .= " AND p.fecha_emision <= '$txtBuscarHasta'";
        }

        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si se obtienen resultados
        if ($resultado) {
            $pedidos = [];
            while ($row = mysqli_fetch_assoc($resultado)) {
                $pedidos[] = $row;
            }
            mysqli_close($conexion);
            return $pedidos;
        } else {
            mysqli_close($conexion);
            return [];
        }
    }


}
