<?php
class controlVerificarEmitirInformePreventa
{
    public function mostrarEmitirInformePreventa($idPedido)
    {
        include_once('../../modelo/pedidos.php');
        $OBJTipos = new pedidos;
        $pedido = $OBJTipos->obtenerPedidoPreventa($idPedido);
        include_once('../../modelo/detalles_pedido.php');
        $OBJTipos = new detalles_pedido;
        $detallesPedido = $OBJTipos->obtenerDetallesPedidoPreventa($idPedido);
        include_once('../../moduloVentas/informePreventa/formEmitirInformePreventa.php');
        $OBJForm = new formEmitirInformePreventa;
        $OBJForm = $OBJForm->formEmitirInformePreventaShow($pedido, $detallesPedido);
    }
    public function emitirInformePreventa($idPedido, $idsDetallePedido, $doublePrecioCosto)
    {
        $estado = 'preventa';
        $arrayActualizar = [];
        foreach ($idsDetallePedido as $key => $detalle) {
            $arrayActualizar[] = [
                "id_detalle_pedido" => $detalle,
                "costo_unitario" => $doublePrecioCosto[$key]
            ];
        }

        include_once('../../modelo/detalles_pedido.php');
        $OBJDetalles = new detalles_pedido;
        $OBJDetalles = $OBJDetalles->actualizarDetallesPedido($arrayActualizar);
        include_once('../../modelo/pedidos.php');
        $OBJTipos = new pedidos;
        $OBJTipos = $OBJTipos->actualizarPedidoPreventa($idPedido, $estado);
        include_once('../../compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se registró exitosamente", "/jbctextil/moduloVentas/pedidos/getEnlacePedido.php");
    }
    public function mostrarAgregarRecursosPreventa($idPedido, $idDetallePedido)
    {
        include_once('../../modelo/detalles_pedido.php');
        $OBJDetalles = new detalles_pedido;
        $detalle_pedido = $OBJDetalles->obtenerDetallePedidoPreventa($idDetallePedido);
        include_once('../../modelo/recursos_detalle_pedido.php');
        $OBJDetalles = new recursos_detalle_preventa;
        $recursosDetallePedido = $OBJDetalles->obtenerRecursosDetallePedido($idDetallePedido);
        include_once('../../modelo/recursos.php');
        $OBJRecursos = new recursos;
        $recursos = $OBJRecursos->obtenerRecursos();
        include_once('../../modelo/distribuidores.php');
        $OBJTipos = new distribuidores;
        $distribuidores = $OBJTipos->obtenerDistribuidoresPreventa();
        include_once('../../moduloVentas/informePreventa/formAgregarRecursosPreventa.php');
        $OBJForm = new formAgregarRecursosPreventa;
        $OBJForm = $OBJForm->formAgregarRecursosPreventaShow($idPedido, $detalle_pedido, $recursosDetallePedido, $recursos, $distribuidores);
    }
    function mostrarEmitirInformePreventaRecurso($idPedido, $idDetallePedido, $arrayEliminar, $arrayIdRecurso, $arrayRecursos, $arrayDistribuidores, $arrayPrecios)
    {
        $arrayEliminar = json_decode($arrayEliminar);
        $arrayActualizar = [];
        $arrayInsertar = [];

        if (!empty($arrayRecursos)) {
            foreach ($arrayIdRecurso as $key => $idRecurso) {
                if (!empty($idRecurso)) {
                    $arrayActualizar[] = [
                        'id_recurso_detalle_pedido' => $idRecurso,
                        'id_detalle_pedido' => $idDetallePedido,
                        'id_recurso' => $arrayRecursos[$key],
                        'id_distribuidor' => $arrayDistribuidores[$key],
                        'precio' => $arrayPrecios[$key],
                    ];
                } else {
                    $arrayInsertar[] = [
                        'id_recurso_detalle_pedido' => null,
                        'id_detalle_pedido' => $idDetallePedido,
                        'id_recurso' => $arrayRecursos[$key],
                        'id_distribuidor' => $arrayDistribuidores[$key],
                        'precio' => $arrayPrecios[$key],
                    ];
                }
            }
        }

        include_once('../../modelo/recursos_detalle_pedido.php');
        $OBJRecursosDP = new recursos_detalle_preventa;
        $pedido = $OBJRecursosDP->eliminarRecursosPreventa($arrayEliminar);
        $pedido = $OBJRecursosDP->actualizarRecursosPreventa($arrayActualizar);
        $pedido = $OBJRecursosDP->insertarRecursosPreventa($arrayInsertar);
        include_once('../../modelo/pedidos.php');
        $OBJTipos = new pedidos;
        $pedido = $OBJTipos->obtenerPedidoPreventa($idPedido);
        include_once('../../modelo/detalles_pedido.php');
        $OBJTipos = new detalles_pedido;
        $detallesPedido = $OBJTipos->obtenerDetallesPedidoPreventa($idPedido);
        include_once('../../moduloVentas/informePreventa/formEmitirInformePreventa.php');
        $OBJForm = new formEmitirInformePreventa;
        $OBJForm = $OBJForm->formEmitirInformePreventaShow($pedido, $detallesPedido);
    }
}
