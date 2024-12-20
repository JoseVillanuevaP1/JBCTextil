<?php
class productos
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }

    /********************************************/
    public function obtenerProductos()
    {
        $conexion = $this->EjecutarConexion();
        $consulta = "SELECT * FROM productos";
        $resultado = mysqli_query($conexion, $consulta);
        mysqli_close($conexion);

        $privilegios = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $privilegios[] = $fila;
        }

        return $privilegios;
    }
}
