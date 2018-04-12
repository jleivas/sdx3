<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/BlogDao.php");
require_once($rootDir . "/int/dao/class.phpmailer.php");
session_start();//carga la sesion
if(!$_SESSION){
?>
<script>
  alert('Acceso denegado: Debes iniciar sesión primero.');
window.location.href='../../entrar.php';
</script>
<?php
exit(0);
}
$usuario1 = UsuarioDao::sqlCargar($_SESSION['usuario']->getRut());

if($usuario1->getTipo() != 3 && $usuario1->getTipo() != 2){
session_destroy();
?>
<script>
  alert('Acceso denegado: Debes iniciar sesión primero.');
window.location.href='../../entrar.php';
</script>
<?php
exit(0);
}

if(isset($_POST['id'])){
    $mail=$_POST['id'];
	$link="";
	if(isset($_POST['link'])){
		$link=$_POST['link'];
	}
	$blog = BlogDao::sqlCargar($link);
	if($blog !=null){
		if(enviarBoletin2($blog->getLink(),$blog->getTitulo(),$mail)>0){
			?>
			<script>
			  alert('Correo enviado satisfactoriamente.');
			  window.location.href='javascript:history.go(-1);';
			</script>
			<?php
		}else{
			?>
			<script>
			  alert('No se pudo enviar el correo.');
			  window.location.href='javascript:history.go(-1);';
			</script>
			<?php
		}
		exit(0);
	}
}
?>
<script>
  alert('Error, no se recibieron datos.');
  window.location.href='javascript:history.go(-1);';
</script>
<?php
exit(0);


function enviarBoletin2($link,$nombre,$mail2)
{
	
	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$mail->Host = "mx1.hostinger.es";
	$mail->From = "no-reply@softdirex.cl";
	$mail->FromName = "Softdirex";
	$mail->Subject = "Newsletter Softdirex";
	$mail->IsHTML(true);
	$cont=0;
	// HTML body

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
		"<h1>Boletín informativo</h1>".
		"<img align='center' src='https://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
		"<br>".
		"</font>".
		"<font face='verdana'>".
		  "Se encuentra disponible un nuevo contenido en nuestro sitio web:<br><br>".
		  "<img align='center' src='https://www.softdirex.cl/imgMail/iphone_sdx.png'><br>".
		  " <h3><a href='".$link."'>".$nombre."</a></h3>".
		"</font>".
		"<font color='Orange' face='verdana'>".
		"<h3>Entérate de más:</h3>".
		"</font>".
		  "<a href='https://www.softdirex.cl/noticias.php' class='boton_personalizado'>Noticias</a><br><br><br>".
		"<font color='Orange' face='verdana'>".
		"<h3>Revise nuestros proyectos:</h3>".
		"</font>".
		  "<a href='https://www.softdirex.cl/portafolio.php' class='boton_personalizado'>Portafolio</a><br><br><br>".
		  "<hr>".
      		"Si no puedes acceder directamente al enlace,<br>copia el siguiente link y pégalo en la barra de direcciones de tu navegador para finalizar tu registro:<br>".
      		"copiar: <b><a href='".$link."'>".$link."</a></b><br>".
      		"<img align='center' src='https://www.softdirex.cl/imgMail/pegar.jpg'><br>".
		  "<hr><h6>Copyright 2017 por Softdirex&nbsp;&nbsp;&nbsp;&nbsp;
		        <img align='center' src='https://www.softdirex.cl/assets/img/footer-logo.png'>      ".
		  "&nbsp;&nbsp;&nbsp;&nbsp;<a href='www.softdirex.cl' target='_blank' color='Orange'><b>Softdirex</b></a>".
		" Un nuevo concepto para tu empresa</h6>".
		"<hr>".
		"<a href='https://www.softdirex.cl/mailDown.php?m=".$mail2."'>Darme de baja<a>".
		"</div>".
		"</body>".
		  "</html>";
	// Configurar Email
	$mail->Body = $mensaje;
	//$mail->AltBody = $text;
	$mail->AddAddress($mail2);
	// Enviar el email
	if(!$mail->Send()) {
	?>
			<script>
				alert('Error al enviar a: <?php echo $mail; ?>.');
			</script>
	<?php
	}else{
		$cont++;
	}
	$mail->ClearAddresses();
	return $cont;
	//------------------------------------------------------------------------------------------------
	
	
}

?>