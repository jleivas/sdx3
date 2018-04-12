<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/BlogDao.php");

session_start();//carga la sesion
if(!$_SESSION){
?>
<script>
  alert('Acceso denegado: Debes iniciar sesión primero.');
window.location.href='entrar.php';
</script>
<?php
exit(0);
}

$link="";
if(isset($_POST['link'])){
	$link=$_POST['link'];
	$titulo="";
	if(isset($_POST['titulo'])){
		$titulo=$_POST['titulo'];
	}
	$autor="";
	if(isset($_POST['autor'])){
		$autor=$_POST['autor'];
	}
	$fecha="";
	if(isset($_POST['fecha'])){
		$fecha=$_POST['fecha'];
	}
	$cat="";
	if(isset($_POST['categoria'])){
		$cat=$_POST['categoria'];
	}
	$blog = BlogDao::sqlCargar($link);

	
	if($blog != null){
		$blog->setTitulo($titulo);
		$blog->setAutor($autor);
		$blog->setFecha($fecha);
		$blog->setCategoria($cat);
		BlogDao::sqlUpdate($blog);
?>
		<script>
		alert('Los datos de la publicación han sido actualizados.');
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