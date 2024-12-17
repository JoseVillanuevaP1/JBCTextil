<?php
include_once("./incClass/pageGeneral.php");
class formLogIn extends pageGeneral
{
	public function formLogInShow()
	{
?>
		<!DOCTYPE html>
		<html lang="es">

		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>JBC Textil</title>
			<link rel="icon" type="image/png" href="./images/JBCTEXTIL.png">
			<!-- CDN de Tailwind CSS -->
			<script src="https://cdn.tailwindcss.com"></script>
			<?php include_once("./incClass/scripts.inc"); ?>
		</head>

		<body class="bg-gray-950 select-none min-h-screen flex flex-col">

			<!-- Contenedor principal de contenido que ocupará el espacio disponible -->
			<div class="flex-grow">
				<?php $this->formHeadShow(); ?>
				<div class="flex flex-col items-center justify-center py-5 px-4">
					<div class="max-w-sm w-full">
						<img src="./images/JBCTEXTIL.png" alt="logo" class='w-28 mb-8 mx-auto block' />

						<div class="p-8 rounded-2xl bg-slate-850 shadow-md shadow-yellow-500">
							<h2 class="text-white text-center text-2xl font-bold">Iniciar Sesion</h2>
							<form class="mt-8 space-y-4" name="form1" method="post" action="./securityModule/getLogIn.php">
								<div>
									<label class="text-white text-sm mb-2 block">Usuario</label>
									<div class="relative flex items-center">
										<input name="txt_user" type="text" class="bg-transparent w-full text-white text-sm border border-white px-3 py-3 rounded-md" placeholder="Ingresa tu usuario" />
										<svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
											<circle cx="10" cy="7" r="6" data-original="#000000"></circle>
											<path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
										</svg>
									</div>
								</div>

								<div>
									<label class="text-white text-sm mb-2 block">Contraseña</label>
									<div class="relative flex items-center">
										<input name="txt_password" type="password" class="bg-transparent w-full text-white text-sm border border-white px-3 py-2 rounded-md" placeholder="Ingresa tu contraseña" />
										<svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
											<path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
										</svg>
									</div>
								</div>

								<div class="!mt-8">
									<input value="Ingresar" type="submit" name="b_login" class="w-full py-2 px-3 text-sm text-neutral-950 font-bold tracking-wide rounded-lg bg-yellow-300 hover:bg-yellow-400 focus:outline-none"></input>
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