	<script>
			window.onload = function () {
    if (typeof history.pushState === "function") {
        history.pushState("jibberish", null, null);
        window.onpopstate = function () {
            history.pushState('newjibberish', null, null);
            // Handle the back (or forward) buttons here
            // Will NOT handle refresh, use onbeforeunload for this.
        };
    }
    else {
        var ignoreHashChange = true;
        window.onhashchange = function () {
            if (!ignoreHashChange) {
                ignoreHashChange = true;
                window.location.hash = Math.random();
                // Detect and redirect change here
                // Works in older FF and IE9
                // * it does mess with your hash symbol (anchor?) pound sign
                // delimiter on the end of the URL
            }
            else {
                ignoreHashChange = false;   
            }
        };
    }
}
			</script>
	
	<script>
			function right(e) {
			var msg = " EMPLEE LOS BOTONES DEL SISTEMA - GRACIAS ";
			if (navigator.appName == 'Netscape' && e.which == 3) {
			alert(msg); // Delete this line to disable but not alert user
			return false;
			}
			else
			if (navigator.appName == 'Microsoft Internet Explorer' && event.button==2) {
			alert(msg); // Delete this line to disable but not alert user
			return false;
			}
			return true;
			}
			document.onmousedown = right;	
			</script>
            <!-- ESTOS SCRIPTS SON PARA NO HABILITAR EL FUNCIONAMIENTO DE REGRESAR -->
			<!-- DEL BOTON ATRAS DEL NAVEGADOR Y PARA ELIMINAR COOKIES DE LA CACHE -->
			<meta http-equiv="Expires" content="0" />
			<meta http-equiv="Pragma" content="no-cache" />
			<script>
				if (history.forward(1)) //Si existe un valor, es decir, que se ha vuelto atrás
				{location.replace(history.forward(1))} //reemplaza la página actual por ese valor, es decir, 
				//la URL desde laque volviste atrás
			</script>
			 <script language="javascript" type="text/javascript">
				 if (document.cookie != "") 
				 {
					la_cookie = document.cookie.split("; ")
					fecha_fin = new Date
					fecha_fin.setDate(fecha_fin.getDate()-1)
					for (i=0; i<la_cookie.length; i++) 
					{
						mi_cookie = la_cookie.split("=")[0]
						document.cookie = mi_cookie + "=;expires=" + fecha_fin.toGMTString()
					}
					document.write("Se han eliminado: " + la_cookie.length + " Cookies ")
				 }			
			 </script>
             <script>
				 function capturarf5(e)
					{
						var code = (e.keyCode ? e.keyCode : e.which);
						if(code == 116) 
						{
							alert("EL SISTEMA HA DESABILITADO LA TECLA F5");
							return false;
						 }
					}
					document.onkeydown=capturarf5;
			 </script>