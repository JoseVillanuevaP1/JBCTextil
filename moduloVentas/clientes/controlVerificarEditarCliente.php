<?php
class controlVerificarEditarCliente
{
    public function mostrarListarCliente($txtBuscarNombre)
    {
        include_once('../../modelo/clientes.php');
        $objuser = new clientes;
        $clientesArray = $objuser->obtenerClientes($txtBuscarNombre);
        include_once('../../moduloVentas/clientes/formListarClientes.php');
        $objForm = new formListarClientes;
        $objForm = $objForm->formListarClientesShow($clientesArray);
    }
    public function mostrarEditarCliente($idCliente)
    {
        
        include_once('../../modelo/clientes.php');
        $objuser = new clientes;
        $clienteArray = $objuser->obtenerCliente($idCliente);

        include_once('../../modelo/tipos_documento.php');
        $modeloTipoDocumento = new tipos_documento();
        $listaTipoDocumento = $modeloTipoDocumento->obtenerTiposDocumento();

        include_once('./formEditarCliente.php');
        $OBJForm = new formEditarCliente;
        $OBJForm = $OBJForm->formEditarClienteShow($clienteArray, $listaTipoDocumento);
    }

    public function editarCliente($idCliente,$txtNombreCliente,$txtApellidoCliente,$intTipoDocumento,$intDocumento,$intTelefonoCliente,$txtCorreoCliente,$txtDireccionCliente)
    {
        include_once('../../modelo/clientes.php');
        $OBJTipos = new clientes;
        $OBJTipos->editarCliente($idCliente,$txtNombreCliente,$txtApellidoCliente,$intTipoDocumento,$intDocumento,$intTelefonoCliente,$txtCorreoCliente,$txtDireccionCliente);
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeConfirmacion.php');
        $OBJ = new mensajeConfirmacion;
        $OBJ = $OBJ->mensajeConfirmacionShow("Se editó exitosamente", "../clientes/getEnlaceClientes.php");
    }
}
