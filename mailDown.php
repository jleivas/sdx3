<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/CorreosDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
$mail="";
if(isset($_GET['m'])){
	$mail=$_GET['m'];
	CorreosDao::anular($mail);
	?>
						<script>
							alert('Su correo electrónico ha sido dado de baja de nuestra base de datos.');
							window.location.href='https://www.softdirex.cl';
						</script>
	<?php
}else{
?>
						<script>
							alert('Imposible avanzar, No tienes permisos suficientes.');
							window.location.href='https://www.softdirex.cl';
						</script>
				<?php
}



?>