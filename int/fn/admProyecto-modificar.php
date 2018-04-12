<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/ProyectoDao.php");

$link="";
if(isset($_POST['link'])){
	$link=$_POST['link'];
	$nombre="";
	if(isset($_POST['nombre'])){
		$nombre=$_POST['nombre'];
	}
	$cliente="";
	$proy = ProyectoDao::sqlCargar($link);
	if(isset($_POST['cliente'])){
		$cliente=$_POST['cliente'];
		$cli = UsuarioDao::sqlCargar($cliente);
		if($cli == null && strcmp($cliente, $proy->getRutCliente()) != 0){
			$cliente="";
?>
			<script>
			alert('Ocurrió un error al registrar los datos: El rut ingresado no existe.');
			window.location.href='javascript:history.go(-1);';
			</script>
<?php	exit(0);
		}
	}
	$categoria="";
	if(isset($_POST['categoria'])){
		$categoria=$_POST['categoria'];
	}
	
	if($proy != null){
		$proy->setRutCLiente($cliente);
		$proy->setNombre($nombre);
		$proy->setCategoria($categoria);
		ProyectoDao::sqlUpdate($proy);
?>
		<script>
		alert('Los datos del proyecto han sido actualizados.');
		window.location.href='javascript:history.go(-1);';
		</script>
<?php	

	}else{
?>
		<script>
		alert('Ocurrió un error al registrar los datos: parametros vacíos.');
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

?>