<?php
class comprobantes
{
    private function EjecutarConexion()
		{
			include_once('conexion.php');			
			$OBJConexion = new conexion;
			return $OBJConexion -> ConectaBD();
		}

        public function registrarComprobante($txtFechaEmision, $intIdUsuario, $datosFormulario)
        {
            // Realizar la conexión
            $conexion = $this->EjecutarConexion();
            
            $idCotizacion = $datosFormulario['idCotizacion']; // Asegúrate de que existe en $datosFormulario
            $intTipoComprobante = $datosFormulario['intTipoComprobante'];
            $estado = 'pagado'; // Este no necesita vinculación porque está fijo en la consulta
            $idComprobanteAnulado = NULL; // Puede quedar como NULL directamente en la consulta
            $idUsuario = $intIdUsuario;


            // Preparar la consulta SQL para insertar en la tabla comprobantes
            $consulta = "INSERT INTO comprobantes (id_cotizacion, fecha_emision, id_tipo_comprobante, estado, id_comprobante_anulado, id_usuario) 
             VALUES ('$idCotizacion', '$txtFechaEmision', '$intTipoComprobante', '$estado', '$idComprobanteAnulado', '$idUsuario')";

        
            // Usar sentencias preparadas para mayor seguridad
            $stmt = mysqli_prepare($conexion, $consulta);
        
            if ($stmt) {

                mysqli_stmt_bind_param($stmt, 'isii', $idCotizacion, $txtFechaEmision, $intTipoComprobante, $estado, $idComprobanteAnulado, $idUsuario);

                mysqli_stmt_execute($stmt);
        
                // Verificar si se realizó la inserción correctamente
                $aciertos = mysqli_stmt_affected_rows($stmt);
        
                // Cerrar la consulta preparada
                mysqli_stmt_close($stmt);
            } else {
                $aciertos = 0;
            }
        
            // Cerrar la conexión
            mysqli_close($conexion);
        
            // Retornar 1 si se insertó al menos una fila, 0 en caso contrario
            return $aciertos > 0 ? 1 : 0;
        }
        
}