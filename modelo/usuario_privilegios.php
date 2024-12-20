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

    public function obtenerUsuarioPrivilegios($idUsuario)
    {
        $conexion = $this->EjecutarConexion();

        // Consulta para obtener los privilegios del usuario
        $consulta = "SELECT p.id_privilegio, p.nombre 
                     FROM usuario_privilegios up
                     JOIN privilegios p ON up.id_privilegio = p.id_privilegio
                     WHERE up.id_usuario = $idUsuario";

        $resultado = mysqli_query($conexion, $consulta);

        // Crear un arreglo para almacenar los privilegios
        $privilegios = [];

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $privilegios[] = $fila; // Almacenar cada privilegio en el arreglo
            }
        }

        // Cerrar la conexión
        mysqli_close($conexion);

        // Retornar los privilegios obtenidos
        return $privilegios;
    }

    // /****************************************************/
    // /****************************************************/
}
