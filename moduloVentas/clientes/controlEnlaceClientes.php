<?php
class controlEnlaceClientes{
    public function mostrarListarCliente()
    {
        include_once('../../moduloVentas/clientes/formListarClientes.php');
        $objForm = new formListarClientes;
        $objForm = $objForm->formListarClientesShow();   
    }
}

?>