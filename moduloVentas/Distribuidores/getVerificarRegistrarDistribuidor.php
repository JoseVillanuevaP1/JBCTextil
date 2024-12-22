<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposDistribuidor($txtNombre, $intRUC, $txtDireccion, $txtCorreo,$intTelefono1,$intTelefono2,$intTelefono3)
{
    if (
        strlen(trim($txtNombre)) > 3  && strlen(trim($intRUC)) == 11 &&
        strlen(trim($txtDireccion)) > 3 && strlen(trim($txtCorreo)) > 3 &&
        (strlen(trim($intTelefono1)) == 0 OR strlen(trim($intTelefono1))== 9) &&
        (strlen(trim($intTelefono2)) == 0 OR strlen(trim($intTelefono2)) == 9) &&
        (strlen(trim($intTelefono3)) == 0 OR strlen(trim($intTelefono3)) == 9)
    )
        return 1;
    else
        return 0;
}

$btnRegistrarDistribuidor = $_POST['btnRegistrarDistribuidor'] ?? null;
$btnConfirmarRegistrarDistribuidor = $_POST['btnConfirmarRegistrarDistribuidor'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnRegistrarDistribuidor) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarRegistrarDistribuidor.php');
    $objForm = new controlVerificarRegistrarDistribuidor;
    $objForm = $objForm->mostrarRegistrarDistribuidor();
} else if (validarBoton($btnConfirmarRegistrarDistribuidor)) {

    $txtNombre = $_POST['txtNombre'];
    $intRUC = $_POST['intRUC'];
    $txtDireccion = $_POST['txtDireccion'];
    $txtCorreo = $_POST['txtCorreo'];
    $intTelefono1 = $_POST['intTelefono1'];
    $intTelefono2  = $_POST['intTelefono2'];
    $intTelefono3  = $_POST['intTelefono3'];

    if (validarCamposDistribuidor($txtNombre, $intRUC, $txtDireccion, $txtCorreo,$intTelefono1,$intTelefono2,$intTelefono3)) {
        include_once('./controlVerificarRegistrarDistribuidor.php');
        $objForm = new controlVerificarRegistrarDistribuidor;
        $objForm = $objForm->registrarDistribuidor($txtNombre, $intRUC, $txtDireccion, $txtCorreo,$intTelefono1,$intTelefono2,$intTelefono3);
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeSistema.php');
        $objMsj = new mensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../Distribuidores/getVerificarRegistrarDistribuidor.php");
    }
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/mensajeSistema.php');
    $objMsj = new mensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../../index.php");
}
