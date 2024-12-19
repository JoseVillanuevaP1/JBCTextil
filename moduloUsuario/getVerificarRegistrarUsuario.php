<?php
if (isset($_POST['btnRegistrarUsuario'])) {
    include_once('./controlVerificarRegistrarUsuario.php');
    $objForm = new controlVerificarRegistrarUsuario;
    $objForm = $objForm->verificarDatosRegistrarUsuario();
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
}
