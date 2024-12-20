<?php
// function validarBoton($boton)
// {
//     return isset($boton);    
// }
// $btnRegistrarCliente = $_POST['btnRegistrarCliente'] ?? null;
// $btnConfirmarRegistrarCliente = $_POST['btnConfirmarRegistrarCliente'] ?? null;

// if(validarBoton($btnRegistrarCliente)){
    
//     include_once('../../moduloVentas/clientes/controlVerificarRegistrarCliente.php');
//     $objForm = new controlVerificarRegistrarCliente;
//     $objForm->traerTiposDocumentos();
// } else {
//     include_once('../../compartido/mensajeSistema.php');
//     $objMsj = new MensajeSistema;
//     $objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");

// }
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}

function validarCamposCliente($txtNombreCliente, $txtApellidoCliente, $intTipoDocumento, $intDocumento, $intTelefonoCliente,$txtCorreoCliente,$txtDireccionCliente)
{
    if (
        strlen(trim($txtNombreCliente)) > 0 && strlen(trim($txtNombreCliente)) <= 30 &&
        strlen(trim($txtApellidoCliente)) > 0 && strlen(trim($txtApellidoCliente)) <= 30 &&
        (
            (trim($txtTipoDocumento) == 1 && strlen(trim($intDocumento)) == 8) ||
            (trim($txtTipoDocumento) == 2 && strlen(trim($intDocumento)) == 11)
        ) &&
        (strlen(trim($intTelefonoCliente)) == 9 || strlen(trim($intTelefonoCliente)) == 0) &&
        (
            strlen(trim($txtCorreoCliente)) == 0 ||
            (strpos(trim($txtCorreoCliente), '@') !== false && strlen(trim($txtCorreoCliente)) <= 30)
        ) &&
        strlen(trim($txtDireccionCliente)) <= 150
    )
        return TRUE;
    else
        return FALSE;
}

$btnRegistrarCliente = $_POST['btnRegistrarCliente'] ?? null;
$btnConfirmarRegistrarCliente = $_POST['btnConfirmarRegistrarCliente'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnRegistrarCliente) || validarBoton($btnRegresar)) {
    include_once('../../moduloVentas/clientes/controlVerificarRegistrarCliente.php');

    $objForm = new controlVerificarRegistrarCliente;
    $objForm = $objForm->traerTiposDocumentos();
} else if (validarBoton($btnConfirmarRegistrarCliente)) {


    $txtNombreCliente = $_POST['txtNombreCliente'];
    $txtApellidoCliente = $_POST['txtApellidoCliente'];
    $intTipoDocumento = $_POST['intTipoDocumento'];
    $intDocumento = $_POST['intDocumento'];
    $intTelefonoCliente = $_POST['intTelefonoCliente'];
    $txtCorreoCliente = $_POST['txtCorreoCliente'];
    $txtDireccionCliente = $_POST['txtDireccionCliente'];

 if (validarCamposCliente($txtNombreCliente, $txtApellidoCliente, $intTipoDocumento, $intDocumento, $intTelefonoCliente,$txtCorreoCliente,$txtDireccionCliente)) {
        include_once('../../moduloVentas/clientes/controlVerificarRegistrarCliente.php');
        $objForm = new controlVerificarRegistrarCliente;
        $objForm = $objForm->registrarCliente($txtNombreCliente, $txtApellidoCliente, $intTipoDocumento, $intDocumento, $intTelefonoCliente,$txtCorreoCliente,$txtDireccionCliente);
 } else {
    include_once('../../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../../moduloVentas/clientes/getVerificarRegistrarCliente.php");
}
} else {
    include_once('../../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}
?> 