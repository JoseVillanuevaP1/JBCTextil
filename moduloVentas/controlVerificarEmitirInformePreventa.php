<?php
class controlVerificarEmitirInformePreventa
{
    public function mostrarEmitirInformePreventa($idPedido)
    {
        include_once('../modelo/pedidos.php');
        $OBJTipos = new pedidos;
        $pedido = $OBJTipos->obtenerPedidoPreventa($idPedido);
        include_once('../modelo/detalles_pedido.php');
        $OBJTipos = new detalles_pedido;
        $detallesPedido = $OBJTipos->obtenerDetallesPedidoPreventa($idPedido);
        include_once('../moduloVentas/formEmitirInformePreventa.php');
        $OBJForm = new formEmitirInformePreventa;
        $OBJForm = $OBJForm->formEmitirInformePreventaShow($pedido, $detallesPedido);
    }
    public function emitirInformePreventa($txtCliente, $txtFechaEntrega, $txtLugarEntrega,  $arrayProductos, $txtFechaEmision, $txtEstado, $txtIdUsuario)
    {
        include_once('../modelo/pedidos.php');
        $OBJpriv = new pedidos;
        $idPedido = $OBJpriv->registrarPedido($txtCliente, $txtFechaEntrega, $txtLugarEntrega, $txtFechaEmision, $txtEstado, $txtIdUsuario);
        include_once('../modelo/detalles_pedido.php');
        $OBJTipos = new detalles_pedido;
        $OBJTipos = $OBJTipos->registrarDetallesPedido($idPedido, $arrayProductos);
        include_once('../compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se registró exitosamente", "../moduloUsuario/getEnlaceUsuario.php");
    }
    public function mostrarAgregarRecursosPreventa($idDetallePedido)
    {
        include_once('../modelo/recursos.php');
        $OBJRecursos = new recursos;
        $recursos = $OBJRecursos->obtenerRecursos();
        include_once('../modelo/tipos_recurso.php');
        $OBJTipos = new tipos_recurso;
        $tiposRecurso = $OBJTipos->obtenerTiposRecurso();
        include_once('../moduloVentas/formAgregarRecursosPreventa.php');
        $OBJForm = new formAgregarRecursosPreventa;
        $OBJForm = $OBJForm->formAgregarRecursosPreventaShow($idDetallePedido, $recursos, $tiposRecurso, $distribuidores = []);
    }
}
