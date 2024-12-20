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
$btnEditarProducto = $_POST['btnEditarProducto'] ?? null;
$btnConfirmarRegistrarProducto = $_POST['btnConfirmarRegistrarProducto'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnBuscarProducto)) {
    include_once('./controlVerificarEditarProducto.php');
    $objForm = new controlVerificarEditarProducto;
    $objForm = $objForm->mostrarListarProducto();
} else if (validarBoton($btnEditarrProducto) || validarBoton($btnRegresar)) {
    $idProducto = $_POST['idProducto'];
    include_once('./controlVerificarEditarProducto.php');
    $objForm = new controlVerificarREditarProducto;
    $objForm = $objForm->mostrarEditarProducto();
} else if (validarBoton($btnConfirmarRegistrarProducto)) {
    $idProducto = $_POST['idProducto'];
    $txtNombre = $_POST['txtNombre'];

    if (validarCamposProducto($txtNombre)) {
        include_once('./controlVerificarRegistrarUsuario.php');
        $objForm = new controlVerificarRegistrarProducto;
        $objForm = $objForm->registrarProducto($txtNombre);
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
        $objMsj = new MensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "../moduloProducto/Productos/getVerificarEditarProducto.php");
    }
} else {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/MensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}
