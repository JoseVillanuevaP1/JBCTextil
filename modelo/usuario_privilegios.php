<?php
class usuario_privilegios
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }
    /****************************************************/
    /****************************************************/
    public function registrarPrivilegios($idUsuario, $privilegios)
    {
        $conexion = $this->EjecutarConexion();
        $valores = [];
        foreach ($privilegios as $privilegio) {
            $valores[] = "('$idUsuario', '$privilegio')";
        }
        $consulta = "INSERT INTO usuario_privilegios (id_usuario, id_privilegio) VALUES " . implode(', ', $valores);
        mysqli_query($conexion, $consulta);
        $aciertos = mysqli_affected_rows($conexion);
        mysqli_close($conexion);
        return $aciertos > 0 ? 1 : 0;
    }
    // /****************************************************/
    // /****************************************************/
}
