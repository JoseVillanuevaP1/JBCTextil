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
}
