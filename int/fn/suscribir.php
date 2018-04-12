<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/CorreosDao.php");

$mail="";
if(isset($_POST['mail'])){
	$mail=$_POST['mail'];
	$para = $mail;
    $titulo = 'SOFTDIREX.CL';
     
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
    "<style>".
    "hr.orange {".
        "border: 1px solid #ff8000;".
        "border-radius: 300px ;". 
        "height: 0px;". 
        "text-align: center;".
        "width:30%;".
    "}".
    "</style>".
    "</head>".
    "<body>".
    "<div class='bloque' style='width:100%; height:auto;'>".
    "<font color='Orange' face='verdana'>".
    "<h1>Conoce los beneficios que puedes obtener gracias a</h1>".
    "<img align='center' src='https://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
    "<br>".
    "</font>".
    "<font color='Gray' face='verdana'>".
      "<h3>Sitios Web  <a href='https://softdirex.cl/sitios-web.html'><small>Saber más</small></a></h3>".
      "<img align='center' src='https://www.softdirex.cl/imgMail/sitios-web-sdx.png'><br><br><hr class = 'orange'>".
      "<h3>Servicio Técnico  <a href='https://softdirex.cl/servicio-tecnico.html'><small>Saber más</small></a></h3>".
      "<img align='center' src='https://www.softdirex.cl/imgMail/servicio-tecnico-sdx.png'><br><br><hr class = 'orange'>".
      "<h3>Desarrollo de Software  <a href='https://softdirex.cl/desarrollo-software.html'><small>Saber más</small></a></h3>".
      "<img align='center' src='https://www.softdirex.cl/imgMail/software.png'><br><br><hr class = 'orange'>".
      "<h3>Aplicaciones Web  <a href='https://softdirex.cl/aplicaciones-web.html'><small>Saber más</small></a></h3>".
      "<img align='center' src='https://www.softdirex.cl/imgMail/sistemas-sdx.png'><br><br><hr class = 'orange'>".
      "<h3>Y mucho más...</h3><br><br>".
   
    "<a href='https://www.softdirex.cl/noticias.php' class='boton_personalizado'>Ver publicaciones</a>".
      "<br><br><br>".
      "Atentamente el equipo de Softdirex.<br>www.softdirex.cl<br><br>".
      "No responda a este correo electrónico. Para comunicarse con nosotros, haga clic en <a href='https://www.softdirex.cl/page-contacts.html'>Contacto</a><br><br><br>".
      "</font>".
      
      
      "<hr><h6>Copyright 2017 por Softdirex&nbsp;&nbsp;&nbsp;&nbsp;
            <img align='center' src='https://www.softdirex.cl/assets/img/footer-logo.png'>      ".
      "&nbsp;&nbsp;&nbsp;&nbsp;<a href='https://www.softdirex.cl' color='Orange'><b>Softdirex</b></a>".
    " Un nuevo concepto para tu empresa</h6>".
    "</div>".
    "</body>".
      "</html>";

    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $cabeceras .= 'From: Softdirex<no-responder@softdirex.cl>';

      
     
     
    @mail($para, $titulo, $mensaje, $cabeceras);

if(CorreosDao::sqlFound($mail) > 0){
	?>
		<script>
			alert('Error: El correo ya se encuentra registrado.');
			window.location.href='javascript:history.go(-1);';
		</script>
	<?php
}else{
	CorreosDao::sqlInsert($mail);
	?>
		<script>
			alert('Correo registrado.');
			window.location.href='javascript:history.go(-1);';
		</script>
	<?php
}
}else{
	?>
		<script>
			alert('Error: No se recibieron datos.');
			window.location.href='javascript:history.go(-1);';
		</script>
	<?php
}
    


?>