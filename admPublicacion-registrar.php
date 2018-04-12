<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/BlogDao.php");
require_once($rootDir . "/int/dao/CorreosDao.php");
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



if(isset($_POST['link'])){
    $link=$_POST['link'];
	$titulo="";
	if(isset($_POST['titulo'])){
		$titulo=$_POST['titulo'];
	}
	$cita="";
	if(isset($_POST['cita'])){
		$cita=$_POST['cita'];
	}
	$autor="";
	if(isset($_POST['autor'])){
		$autor=$_POST['autor'];
	}
	$fecha="";
	if(isset($_POST['fecha'])){
		$fecha=$_POST['fecha'];
	}
	$categoria=0;
	if(isset($_POST['categoria'])){
		$categoria=$_POST['categoria'];
	}
	$estado=1;
	$imagen="assets/pages/img/posts/default.jpg";
	if(isset($_POST['imagen'])){
		$imagen= "assets/pages/img/posts/".$_POST['imagen'];
	}
	$enviar=1;
	if(isset($_POST['enviar'])){
		$enviar=$_POST['enviar'];
	}
	$id = BlogDao::sqladdId();
	try{
		if(BlogDao::sqlExiste($link) == 0){
			$blog=new Blog($id,$link, $titulo, $cita, $autor,$fecha,$imagen,$categoria,$estado);

			if(BlogDao::sqlInsert($blog) > 0){
			?>
				<script>
					alert('La publicación <?php echo $titulo;?> ha sido registrada.');
					//window.location.href='javascript:history.go(-1);';
				</script>
			<?php
				if($enviar == 2){
					$misRegistros = CorreosDao::sqlTodo();
					$cont =0;
					foreach ($misRegistros as $fila) {
						$cont = $cont+enviarBoletin($link,$titulo,$fila['corr_correo']);
					}
					?>
						<script>
							alert('Se enviaron <?php echo $cont; ?> correos.');
							window.location.href='javascript:history.go(-1);';
						</script>
					<?php
					
				}
			}else{
			?>
				<script>
					alert('Ha ocurrido un error, los datos no se registraron correctamente.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
			}
			
		}else{
			?>
				<script>
					alert('Ha ocurrido un error, La publicación ya existe.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
				
		}
			
	}catch(Exception $e){
		?>
			<script>
				alert('Ocurrió un error al intentar modificar los datos: <?php echo $e->getMessage(); ?>.');
				window.location.href='javascript:history.go(-1);';
			</script>
		<?php
	}
}else{
?>
<script>
alert('Ocurrió un error al registrar los datos: parametros vacíos.');
window.location.href='javascript:history.go(-1);';
</script>
<?php	
}


function enviarBoletin($link,$nombre,$mail)
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
		"<a href='https://www.softdirex.cl/mailDown.php?m=".$fila['corr_correo']."'>Darme de baja<a>".
		"</div>".
		"</body>".
		  "</html>";
	// Configurar Email
	$mail->Body = $mensaje;
	//$mail->AltBody = $text;
	$mail->AddAddress($mail, $mail);
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