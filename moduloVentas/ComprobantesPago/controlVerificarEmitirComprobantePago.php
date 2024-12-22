<?php
class controlVerificarEmitirComprobantePago
{
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