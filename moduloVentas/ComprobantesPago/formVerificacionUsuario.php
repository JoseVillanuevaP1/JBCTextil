<?php
include_once("../../compartido/pantalla.php");
class formVerificacionUsuario extends pantalla
{
	public function formVerificacionUsuarioShow($datosFormulario)
	{
        // Convertir el array en formato JSON
        $datosFormularioJson = json_encode($datosFormulario);
?>      
		<!DOCTYPE html>
		<html lang="es">

		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>JBC Textil</title>
			<link rel="icon" type="image/png" href="../../images/JBCTEXTIL.png">
			<!-- CDN de Tailwind CSS -->
			<script src="https://cdn.tailwindcss.com"></script>
			<?php include_once("../../compartido/scripts.inc"); ?>
		</head>

		<body class="bg-gray-950 select-none min-h-screen flex flex-col">

			<!-- Contenedor principal de contenido que ocupará el espacio disponible -->
			<div class="flex-grow">
				<?php $this->formHeadShow(); ?>
				<div class="flex flex-col items-center justify-center py-5 px-4">
					<div class="max-w-sm w-full">
						<img src="./images/JBCTEXTIL.png" alt="logo" class='w-28 mb-8 mx-auto block' />

						<div class="p-8 rounded-2xl bg-slate-850 shadow-md shadow-yellow-500">
							<h2 class="text-white text-center text-2xl font-bold">Confirmar su contraseña</h2>
							<form class="mt-8 space-y-4" name="form1" method="post" action="./getVerificarEmitirComprobantePago.php">

								<div>
									<div class="relative flex items-center">
										<input name="txt_password" type="password" class="bg-transparent w-full text-white text-sm border border-white px-3 py-2 rounded-md" placeholder="Ingresa tu contraseña" />
										<svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
											<path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
										</svg>
									</div>
								</div>
                                <input type="hidden" name="datosFormulario" value="<?= htmlspecialchars($datosFormularioJson) ?>" />
								<div class="!mt-8">
									<input value="Confirmar" type="submit" name="btnConfirmar" class="w-full py-2 px-3 text-sm text-neutral-950 font-bold tracking-wide rounded-lg bg-yellow-300 hover:bg-yellow-400 focus:outline-none"></input>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php $this->formFooterShow(); ?>
		</body>

		</html>

<?php
	}
}
?>