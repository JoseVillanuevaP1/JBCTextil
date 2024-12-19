<?php
class tipos_documento
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }

    /********************************************/
    public function obtenerTiposDocumento()
    {
        $conexion = $this->EjecutarConexion();
        $consulta = "SELECT * FROM tipos_documento";
        $resultado = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);

        $tiposDocumento = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $tiposDocumento[] = $fila;
        }

        return $tiposDocumento;
    }
}
