<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/ComentarioDao.php");
require_once($rootDir . "/int/dao/CorreosDao.php");

date_default_timezone_set("Chile/Continental");
$hoy = date('y-m-j');
$ahora = date('H:i:s');

$link = "";
if(isset($_POST['link'])){
	$link = $_POST['link'];
	//$subcadena = "?"; 
	// localicamos en que posici�n se haya la $subcadena, en nuestro caso la posicion es "7"
	//$posicionsubcadena = strpos ($cadena, $subcadena); 
	// eliminamos los caracteres desde $subcadena hacia la izq, y le sumamos 1 para borrar tambien el @ en este caso
	
	//$link = substr ($cadena, 0,($posicionsubcadena)); 
	$nombre = $_POST['nombre'];
	$mail = $_POST['mail'];
	$mensaje = $_POST['mensaje'];

	$id = ComentarioDao::sqladdId();
	$comentario = new Comentario($id, $nombre, $hoy, $mensaje,1,$link);

	ComentarioDao::sqlInsert($comentario);
	if(CorreosDao::sqlFound($mail) > 0){
				?>
					<script>
						alert('<?php echo $nombre; ?>: Su comentario ha sido registrado,\nSolicita reactivar tu suscripción para seguir comentando nuevas publicaciones.');
						window.location.href='javascript:history.go(-1);';
					</script>
				<?php
	}else{
				CorreosDao::sqlInsert($mail);
				?>
					<script>
						alert('<?php echo $nombre; ?>: Su comentario ha sido registrado,\nRevisa constantemente tu correo, llegarán nuevas publicaciones.');
						window.location.href='javascript:history.go(-1);';
					</script>
				<?php
	}
}
?>
					<script>
						alert('No se recibieron datos del link:<?php echo $link; ?>');
						window.location.href='javascript:history.go(-1);';
					</script>
<?php


?>