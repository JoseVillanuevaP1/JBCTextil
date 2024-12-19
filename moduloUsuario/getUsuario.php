<?php
if (isset($_POST['btnUsuarios'])) {
    include_once('../moduloUsuario/formListarUsuarios.php');
    $objForm = new formListarUsuarios;
    $objForm = $objForm->formListarUsuariosShow();
} else {
    include_once('../compartido/mensajeSistema.php');
    $objMsj = new MensajeSistema;
    $objMsj->mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>", "<p><a href='../index.php'>Ir al inicio</a></p>");
}
