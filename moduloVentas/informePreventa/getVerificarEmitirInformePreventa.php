<?php
function validarBoton($boton)
{
    if (isset($boton))
        return TRUE;
    else
        return FALSE;
}
function validarCamposRecursosPreventa($idsRecursosEliminar, $arrayIdRecurso, $arrayRecursos, $arrayDistribuidores, $arrayPrecios)
{
    if (
        isset($idsRecursosEliminar) && isset($arrayIdRecurso) &&
        isset($arrayRecursos) && isset($arrayDistribuidores) && isset($arrayPrecios)
    )
        return 1;
    else
        return 0;
}


$idsRecursosEliminar = $_POST['idsRecursosEliminar'] ?? null;
$arrayIdRecurso = $_POST['arrayIdRecurso'] ?? null;
$arrayRecursos = $_POST['arrayRecursos'] ?? null;
$arrayDistribuidores = $_POST['arrayDistribuidores'] ?? null;
$arrayPrecios = $_POST['arrayPrecios'] ?? null;
$idsDetallePedido = $_POST['idsDetallePedido'] ?? null;
$doublePrecioCosto = $_POST['doublePrecioCosto'] ?? null;

$idPedido = $_POST['idPedido'] ?? null;
$idDetallePedido = $_POST['intIdDetallePedido'] ?? null;
$btnEmitirInformePreventa = $_POST['btnEmitirInformePreventa'] ?? null;
$btnAgregarRecursosPreventa = $_POST['btnAgregarRecursosPreventa'] ?? null;
$btnConfirmarRecursosPreventa = $_POST['btnConfirmarRecursosPreventa'] ?? null;
$confirmarEmitirInformePreventa = $_POST['confirmarEmitirInformePreventa'] ?? null;
$btnRegresar = $_POST['btnRegresar'] ?? null;

if (validarBoton($btnEmitirInformePreventa) || validarBoton($btnRegresar)) {
    include_once('./controlVerificarEmitirInformePreventa.php');
    $objForm = new controlVerificarEmitirInformePreventa;
    $objForm = $objForm->mostrarEmitirInformePreventa($idPedido);
} else if (validarBoton($btnAgregarRecursosPreventa)) {
    include_once('./controlVerificarEmitirInformePreventa.php');
    $objForm = new controlVerificarEmitirInformePreventa;
    $objForm = $objForm->mostrarAgregarRecursosPreventa($idPedido, $idDetallePedido);
} else if (validarBoton($btnConfirmarRecursosPreventa)) {

    if (validarCamposRecursosPreventa($idsRecursosEliminar, $arrayIdRecurso, $arrayRecursos, $arrayDistribuidores, $arrayPrecios)) {
        include_once('./controlVerificarEmitirInformePreventa.php');
        $objForm = new controlVerificarEmitirInformePreventa;
        $objForm = $objForm->mostrarEmitirInformePreventaRecurso($idPedido, $idDetallePedido, $idsRecursosEliminar, $arrayIdRecurso, $arrayRecursos, $arrayDistribuidores, $arrayPrecios);
    } else {
        include_once('../compartido/mensajeSistema.php');
        $objMsj = new mensajeSistema;
        $objMsj->mensajeSistemaShow("Error: Datos no validos<br>", "/jbctextil/moduloVentas/pedidos/getEnlacePedido.php");
    }
} else if (validarBoton($confirmarEmitirInformePreventa)) {
    include_once('./controlVerificarEmitirInformePreventa.php');
    $objForm = new controlVerificarEmitirInformePreventa;
    $objForm = $objForm->emitirInformePreventa($idPedido, $idsDetallePedido, $doublePrecioCosto);
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new mensajeSistema;
    $objMsj->mensajeSistemaShow("Error: Se ha detectado un acceso no autorizado<br>", "../index.php");
}
