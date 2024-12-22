<?php
class tipos_recurso
{
    private function EjecutarConexion()
    {
        include_once('conexion.php');
        $OBJConexion = new conexion;
        return $OBJConexion->ConectaBD();
    }
    /***************************************************************************************/
    /***************************************************************************************/
    public function obtenerTiposRecurso()
    {
        $conexion = $this->EjecutarConexion();
        // Consulta con filtro OR para nombre y username
        $consulta = "SELECT id_tipo_recurso, nombre
						FROM tipos_recurso";
        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $consulta);

        $tipos_recurso = [];
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $tipos_recurso[] = $fila;
            }
        }
        // Cerrar la conexión
        mysqli_close($conexion);
        return $tipos_recurso;
    }
}
