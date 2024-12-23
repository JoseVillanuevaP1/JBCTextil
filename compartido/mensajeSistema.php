<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/JBCTextil/compartido/pantalla.php');
class mensajeSistema extends pantalla
{
	public function mensajeSistemaShow($mensaje, $link)
	{
?>
		<!DOCTYPE html>
		<html lang="es">

		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>JBC Textil</title>
			<link rel="icon" type="image/png" href="../../images/JBCTEXTIL.png">
			<script src="https://cdn.tailwindcss.com"></script>
		</head>

		<body class="bg-gray-950 select-none min-h-screen flex flex-col">

			<div class="flex-grow">
				<?php $this->formHeadShow(); ?>
				<div class="flex flex-col items-center justify-center py-10 px-2">
					<div class="max-w-sm w-full">
						<section class="flex items-center h-full bg-gray-950">
							<div class="container flex flex-col items-center justify-center px-2 my-4 space-y-8 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-auto h-40">
									<path fill="#ffff00" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
								</svg><i class="fa-solid fa-circle-xmark" style="color: #fcd34d;"></i>
								<p class="text-2xl text-white"><?php echo ($mensaje); ?></p>
								<form action="<?php echo $link ?>" method="post">
									<button type="submit" name="btnRegresar" class="px-8 py-2 font-bold rounded bg-yellow-300">Regresar</button>
								</form>
							</div>
						</section>
					</div>
				</div>
			</div>
			<?php $this->formFooterShow(); ?>
		</body>

		</html>
	<?php
	}


	public function mensajeConfirmacionShow($mensaje, $link)
	{
	?>
		<!DOCTYPE html>
		<html lang="es">

		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>JBC Textil</title>
			<link rel="icon" type="image/png" href="../../images/JBCTEXTIL.png">
			<script src="https://cdn.tailwindcss.com"></script>
		</head>

		<body class="bg-gray-950 select-none min-h-screen flex flex-col">

			<div class="flex-grow">
				<?php $this->formHeadShow(); ?>
				<div class="flex flex-col items-center justify-center py-10 px-2">
					<div class="max-w-sm w-full">
						<section class="flex items-center h-full bg-gray-950">
							<div class="container flex flex-col items-center justify-center px-2 my-4 space-y-8 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-auto h-40"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
									<path fill="#f5f22e" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
								</svg>
								<p class="text-2xl text-white"><?php echo ($mensaje); ?></p>
								<form action="<?php echo $link ?>" method="post">
									<button type="submit" name="btnRegresar" class="px-8 py-2 font-bold rounded bg-yellow-300">Regresar</button>
								</form>
							</div>
						</section>
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