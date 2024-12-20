<?php
function validarBoton($boton)
{
    return isset($boton);    
}
$btnClientes = $_POST['btnClientes'] ?? null;
if(validarBoton($btnClientes)){
    include_once('../../moduloVentas/clientes/formListarClientes.php');
    $objForm = new formListarClientes;
    $objForm = $objForm->formListarClientesShow();
} else {
    include_once('../../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");

}
?>