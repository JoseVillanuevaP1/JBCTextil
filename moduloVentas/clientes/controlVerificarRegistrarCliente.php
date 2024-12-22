<?php
class controlVerificarRegistrarCliente
{   
    public function mostrarRegistrarCliente()
    {
        include_once('../../modelo/tipos_documento.php');
        include_once('../../moduloVentas/clientes/formRegistrarCliente.php');
        $modeloTipoDocumento = new tipos_documento();
        $formRegistrar = new formRegistrarCliente();
        $TiposDocumento = $modeloTipoDocumento->obtenerTiposDocumento();
        $formRegistrar->formRegistrarClienteShow($TiposDocumento);
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
