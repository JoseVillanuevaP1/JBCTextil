<?php
class controlVerificarEmitirComprobantePago
{
    public function verificarContraseña($intIdUsuario, $txt_password, $txtFechaEmision,$datosFormulario){
        include_once('../../modelo/usuarios.php');
		$OBJUser = new usuarios;
		$respuesta = $OBJUser->verificarUsuario($intIdUsuario, $txt_password);
        if ($respuesta){
            include_once('../../modelo/comprobantes.php');
            $OBJUser = new comprobantes;
            $respuesta = $OBJUser->registrarComprobante($txtFechaEmision, $intIdUsuario, $datosFormulario);
            include_once('../../modelo/pedidos.php');
            $pedido = new pedidos;
            $pedido->cambiarEstadoPedido($datosFormulario['idCotizacion']);
            include_once('../compartido/mensajeConfirmacion.php');
            $OBJ = new mensajeConfirmacion;
            $OBJ = $OBJ->mensajeConfirmacionShow("Se emitio exitosamente el comprobante", "../pedidos/getEnlaceComprobantePago.php");
        } else {
            include_once('../../compartido/mensajeSistema.php');
            $objMsj = new mensajeSistema;
            $objMsj->mensajeSistemaShow("Error: Contraseña incorrecta<br>", "../pedidos/getEnlaceComprobantePago.php");

        }

    }
    public function mostrarVerificacionUsuario($datosFormulario){
        include_once('./formVerificacionUsuario.php');
        $OBJForm = new formVerificacionUsuario;
        $OBJForm->formVerificacionUsuarioShow($datosFormulario);
    }
    public function mostrarFormListarPedidoComprobante(){
        include_once('./formListarPedidoComprobante.php');
        $OBJForm = new formListarPedidoComprobante;
        $OBJForm->formListarPedidoComprobanteShow();
    }
    public function buscarpedido($txtBuscarCliente,$txtBuscarDesde,$txtBuscarHasta){
        include_once('./formListarPedidoComprobante.php');
        include_once('../../modelo/pedidos.php');
        $OBJForm = new pedidos;
        $arrayPedidos= $OBJForm->obtenerPedidosCotizados($txtBuscarCliente,$txtBuscarDesde,$txtBuscarHasta);
        $OBJForm = new formListarPedidoComprobante;
        $OBJForm->formListarPedidoComprobanteShow($arrayPedidos);
    }


    public function mostrarEmitirComprobantePago()
    {
        include_once('../../modelo/privilegios.php');
        $OBJTipos = new privilegios;
        $privilegios = $OBJTipos->obtenerPrivilegios();
        include_once('./formEmitirComprobantePago.php');
        $OBJForm = new formEmitirComprobantePago;
        $OBJForm = $OBJForm->formEmitirComprobantePagoShow($privilegios);
    }
    public function EmitirComprobantePago($nombre,$RUC,$Direccion,$Correo,$Telefono1,$Telefono2,$Telefono3)
    {
        include_once('../../modelo/distribuidores.php');
        $OBJTipos = new comprobantesdepago;
        $OBJTipos->emitirComprobantePago($nombre,$RUC,$Direccion,$Correo,$Telefono1,$Telefono2,$Telefono3);
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se registró exitosamente", "../ComprobantesPago/getEnlaceComprobantesPago.php");
    }
}