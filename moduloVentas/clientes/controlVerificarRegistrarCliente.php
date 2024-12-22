<?php
class controlVerificarRegistrarCliente
{
    public function traerTiposDocumentos()
    {
        include_once('../../modelo/tipos_documento.php');
        include_once('../../moduloVentas/clientes/formRegistrarCliente.php');
        $modeloTipoDocumento = new tipos_documento();
        $formRegistrar = new formRegistrarCliente();
        $listaTipoDocumento = $modeloTipoDocumento->obtenerTiposDocumento();
        $formRegistrar->formRegistrarClienteShow($listaTipoDocumento);
    }
    public function registrarCliente($txtNombreCliente, $txtApellidoCliente, $intTipoDocumento, $intDocumento, $intTelefonoCliente, $txtCorreoCliente, $txtDireccionCliente)
    {
        include_once('../../modelo/clientes.php');
        $OBJTipos = new clientes;
        $OBJTipos->registrarCliente($txtNombreCliente, $txtApellidoCliente, $intTipoDocumento, $intDocumento, $intTelefonoCliente, $txtCorreoCliente, $txtDireccionCliente);
        include_once('../../compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se registró exitosamente", "../../moduloVentas/clientes/getEnlaceClientes.php");
    }
}
