<?php
function mostrarLista()
{
    include_once('../../moduloVentas/clientes/formListarClientes.php');
    $objForm = new formListarClientes;
    $objForm = $objForm->formListarClientesShow();   
}
mostrarLista()

?>