<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/CorreosDao.php");

$mail="";
if(isset($_POST['mail'])){
	$mail=$_POST['mail'];
	$para = $mail;
    $titulo = 'Subscripción | SOFTDIREX.CL';
     
    $mensaje = "<html>".
    "<head>".
    "<style type='text/css'>".
      ".boton_personalizado{".
        "text-decoration: none;".
        "padding: 10px;".
        "font-weight: 600;".
        "font-size: 20px;".
        "color: #ffffff;".
        "background-color: #ff8000;".
        "border-radius: 10px;".
        "border: 2px #0016b0;".
      "}".
       ".boton_personalizado:hover{".
        "color: #ff8000;".
        "background-color: #ffffff;".
      "}".
      ".bloque {".
      "background-color: #fafafa;".
      "margin: 1rem;".
      "padding: 1rem;".
      "text-align: center;".
    "}".
    "</style>".
    "</head>".
    "<body>".
    "<div class='bloque' style='width:100%; height:auto;'>".
    "<font color='Orange' face='verdana'>".
    "<h1>Gracias por subscribirte.</h1>".
    "<img align='center' src='https://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
    "<br>".
    "</font>".
    "<font face='verdana'>".
      " Ahora que te has registrado en nuestro boletín,

    serás el primero en recibir nuestras novedades en sitios web, sistemas, tecnología, proyectos, móviles y mucho más.<br><br>".
   
    "<a href='https://www.softdirex.cl/noticias.php' class='boton_personalizado'>Ver publicaciones</a>".
      "<br><br><br>".
      "Atentamente el equipo de Softdirex.<br>www.softdirex.cl<br><br>".
      "No responda a este correo electrónico. Para comunicarse con nosotros, haga clic en <a href='www.softdirex.cl/page-contacts.html'>Contacto</a><br><br><br>".
      "<hr>".
      "Si no puedes acceder directamente al enlace,<br>copia el siguiente link y pégalo en la barra de direcciones de tu navegador:<br>".
      "copiar: <b>https://www.softdirex.cl/noticias.php</b>".
      "<img align='center' src='https://www.softdirex.cl/imgMail/pegar.jpg'><br>".
      "<hr><h6>Copyright 2017 por Softdirex&nbsp;&nbsp;&nbsp;&nbsp;
            <img align='center' src='https://www.softdirex.cl/assets/img/footer-logo.png'>      ".
      "&nbsp;&nbsp;&nbsp;&nbsp;<a href='www.softdirex.cl' color='Orange'><b>Softdirex</b></a>".
    " Un nuevo concepto para tu empresa</h6>".
    "</div>".
    "</body>".
      "</html>";

    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $cabeceras .= 'From: Softdirex<no-responder@softdirex.cl>';

      
     
     
    @mail($para, $titulo, $mensaje, $cabeceras);

if(CorreosDao::sqlFound($mail) > 0){
	CorreosDao::activar($mail);
	?>
		<script>
			alert('Gracias por volver a suscribirte!\nSoftdirex te da la bienvenida...');
			window.location.href='javascript:history.go(-1);';
		</script>
	<?php
}else{
	CorreosDao::sqlInsert($mail);
	?>
		<script>
			alert('Gracias por suscribirte!\nSoftdirex te da la bienvenida...');
			window.location.href='javascript:history.go(-1);';
		</script>
	<?php
}
}else{
	?>
		<script>
			alert('Error, no se recibieron datos.');
			window.location.href='index.php';
		</script>
	<?php
}
    


?>