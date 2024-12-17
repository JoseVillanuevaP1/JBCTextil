<?
	if(isset($_POST['exitSistema'])and strcmp($_POST['login'],"")!=0)
	{
				include_once('../incClass/formMensajeSistema.php');
				$objMsj = new formMensajeSistema;
				$objMsj -> mensajeExitShow("Gracias por emplear el sistema<br>","<p><a href='../index.php'>Inicie su sesion</a></p>");	
				?> <script>window.close();</script> <?php				
	}
	else
	{
				include_once('../incClass/formMensajeSistema.php');
				$objMsj = new formMensajeSistema;
				$objMsj -> mensajeErrorShow("Error: Se ha detectado un acceso no autorizado<br>o los valores ingresados en la autenticacion no son validos <br>","<p><a href='../index.php'>Ir al inicio</a></p>");	
	}
?>