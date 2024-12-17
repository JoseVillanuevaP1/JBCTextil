<?php
include_once("../incClass/pageGeneral.php");
class formMenuUser extends pageGeneral
{
	public function formMenuUserShow($login, $privilegios)
	{
?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			<title>Menu de usuario</title>
			<link href="../css/style.css" rel="stylesheet" type="text/css" />
			<link href="./css/style.css" rel="stylesheet" type="text/css" />
		</head>
		<?php include_once("../incClass/scripts.inc"); ?>

		<body>
			<p>
				<?php $this->formHeadShow_2(); ?>
			</p>
			<p>&nbsp;</p>
			<table width="640" border="0" align="center">
				<tr>
					<td class="postmetadataheader" align="center">Menu Principal</td>
				</tr>
				<tr>
					<td>
						<?php
						$max = count($privilegios) - 1;
						$cont = 0;
						$grupoantiguo = "";
						$banderatabla = 0;
						for ($i = 0; $i < $max; $i++) {
							if (strcmp($grupoantiguo, $privilegios[$cont]['grupo']) != 0 and strcmp($privilegios[$cont]['grupo'], "") != 0) {
								echo "<br><hr><strong><center>M�dulo: " . strtoupper($privilegios[$cont]['grupo']) . "</center></strong><br>";
							}
							echo "<table border='0' width='640' align='center'>";
							echo "<tr>";
							for ($columna = 1; $columna <= 4; $columna++) {
								echo "<td align='center' width='200'>";
								echo "<form id='form' name='form' method='post' action='" . $privilegios[$cont]['path'] . "'>";
								echo "<img src='../images/" . $privilegios[$cont]['image'] . "' width='37' height='37' />";
								echo "<center><input type='submit' name='goBotonform' class='postmetadataheader' id='goBotonform' value='.......' /></center>";
								echo "<center>" . ucwords(strtolower($privilegios[$cont]['label'])) . "</center>";
								echo "<input type='hidden' name='login' id='login' value='" . $login . "' />";
								echo "</form>";
								//echo $privilegios[$cont]['label']." ".$privilegios[$cont]['path']." ".$privilegios[$cont]['image']." ".$privilegios[$cont]['grupo'];					
								echo "</td>";
								$grupoantiguo = $privilegios[$cont]['grupo'];
								$cont++;
								if (strcmp($grupoantiguo, $privilegios[$cont]['grupo']) != 0) {
									echo "</tr></table>";
									break;
								}
								if ($cont == $max) break;
							}
							if ($cont == $max) break;
						}
						?></td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<form id="form1" name="form1" method="post" action="../incClass/salirSistema.php">
				<center><input type="submit" name="exitSistema" id="exitSistema" value="Salir del sistema" class="postmetadataheader" />
					<input name="login" type="hidden" id="login" value="<?php echo $login; ?>" />
				</center>
			</form>
			<p>&nbsp;</p>
			<p>
				<?php $this->formFooterShow(); ?>
			</p>
		</body>

		</html>

<?php
	}
}
?>