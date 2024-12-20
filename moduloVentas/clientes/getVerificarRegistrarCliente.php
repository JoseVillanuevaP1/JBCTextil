<?php
function validarBoton($boton)
{
    return isset($boton);    
}
$btnRegistrarCliente = $_POST['btnRegistrarCliente'] ?? null;
if(validarBoton($btnRegistrarCliente)){
    include_once('../../moduloVentas/clientes/controlVerificarRegistrarCliente.php');
    $objForm = new formListarClientes;
    $objForm = $objForm->formListarClientesShow();
} else {
    include_once('../../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");

}
?>