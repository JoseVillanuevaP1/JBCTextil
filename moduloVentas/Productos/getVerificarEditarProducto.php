<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposProducto($txtNombre)
{
    if (
        strlen(trim($txtNombre)) > 3  
    )
        return 1;
    else
        return 0;
}

$btnBuscarProducto = $_POST['btnBuscarProducto'] ?? null;
$btnRegistrarProducto = $_POST['btnRegistrarProducto'] ?? null;
$btnConfirmarRegistrarProducto = $_POST['btnConfirmarRegistrarProducto'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarProducto)) {
    include_once('./controlVerificarEditarProductos.php');
    $objForm = new controlVerificarEditarProducto;
    $objForm = $objForm->mostrarListarProducto();
} else if (validarBoton($btnRegistrarProducto) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarRegistrarProducto.php');
    $objForm = new controlVerificarRegistrarProducto;
    $objForm = $objForm->mostrarRegistrarProducto();
} else if (validarBoton($btnConfirmarRegistrarProducto)) {

    $txtNombre = $_POST['txtNombre'];

    if (validarCamposProducto($txtNombre)) {
        include_once('./controlVerificarRegistrarUsuario.php');
        $objForm = new controlVerificarRegistrarProducto;
        $objForm = $objForm->registrarProducto($txtNombre);
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
        $objMsj = new MensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../moduloUsuario/getVerificarRegistrarUsuario.php");
    }
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}