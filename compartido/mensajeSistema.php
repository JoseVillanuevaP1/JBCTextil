<?php
include_once("../compartido/pantalla.php");
class MensajeSistema extends pantalla
{
	public function mensajeExitShow($mensaje, $link)
	{
?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">

		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
			<title>Mensaje del sistema</title>
			<link href="../css/style.css" rel="stylesheet" type="text/css" />
			<link href="./css/style.css" rel="stylesheet" type="text/css" />
			<script src="https://cdn.tailwindcss.com"></script>
		</head>
		<?php include_once("../compartido/scripts.inc"); ?>

		<body>
			<p>
				<?php $this->formHeadShow_2(); ?>

			</p>
			<p>&nbsp;</p>
			<table width="359" border="0" align="center">
				<tr>
					<td width="337" align="center" class="postmetadataheader">Mensaje del Sistema</td>
				</tr>
				<tr>
					<td>
						<table width="335" border="0" align="center">
							<tr>
								<td width="67" rowspan="2" align="center"><img src="../images/Exit.png" width="48" height="48" /></td>
								<td align="center">Mensaje</td>
							</tr>
							<tr>
								<td class="blockcontent-body" align="center"><?php echo strtoupper($mensaje); ?></td>
							</tr>
							<tr>
								<td align="center">&nbsp;</td>
								<td class="blockcontent-body" align="center"><?php echo $link; ?></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>

			<p>&nbsp;</p>
			<?php $this->formFooterShow(); ?>
		</body>

		</html>

	<?php
	}



	public function mensajeErrorShow($mensaje, $link)
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
		</head>

		<body class="bg-gray-950 select-none min-h-screen flex flex-col">

			<!-- Contenedor principal de contenido que ocupará el espacio disponible -->
			<div class="flex-grow">
				<?php $this->formHeadShow(); ?>
				<div class="flex flex-col items-center justify-center py-10 px-2">
					<div class="max-w-sm w-full">
						<section class="flex items-center h-full bg-gray-950">
							<div class="container flex flex-col items-center justify-center px-2 my-4 space-y-8 text-center">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-auto h-40"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
									<path fill="#ffff00" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
								</svg><i class="fa-solid fa-circle-xmark" style="color: #fcd34d;"></i>
								<p class="text-2xl text-white"><?php echo ($mensaje); ?></p>
								<a rel="noopener noreferrer" href="http://localhost/jbctextil/" class="px-8 py-2 font-bold rounded bg-yellow-300">Regresar</a>
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