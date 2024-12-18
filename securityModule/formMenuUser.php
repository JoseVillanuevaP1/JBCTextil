<?php
include_once("../incClass/pageGeneral.php");
class formMenuUser extends pageGeneral
{
	public function formMenuUserShow($login, $privilegios)
	{
?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<meta charset="UTF-8" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title>
				Panel de Inicio
			</title>
			<script src="https://cdn.tailwindcss.com"></script>
		</head>

		<body>

			<div class="flex h-screen overflow-hidden">
				<?php $this->formSideBarShow(); ?>
				<!-- ===== Content  ===== -->
				<div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
					<?php $this->formHeadShow_2(); ?>
					<!-- ===== Main  ===== -->
					<main class="min-h-screen bg-gray-900 select-none">
						<div class="mx-auto max-w-screen-2xl p-4 h-full text-white">
						</div>
					</main>
					<!-- ===== Main ===== -->
				</div>
				<!-- ===== Content  ===== -->
			</div>

		</body>
		<script>
			<?php include_once("../js/toggleHeader.js"); ?>
		</script>

		</html>
<?php
	}
}
?>