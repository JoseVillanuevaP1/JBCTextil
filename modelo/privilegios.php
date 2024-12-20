<?php
class privilegios
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }

    /********************************************/
    public function obtenerPrivilegios()
    {
        $conexion = $this->EjecutarConexion();
        $consulta = "SELECT * FROM privilegios";
        $resultado = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);

        $privilegios = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $privilegios[] = $fila;
        }

        return $privilegios;
    }
}
