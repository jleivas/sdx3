<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/BlogDao.php");
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
	$cita="";
	if(isset($_POST['cita'])){
		$cita=$_POST['cita'];
	}
	$link2=$link;
	if(isset($_POST['link2'])){
		$link2=$_POST['link2'];
	}
	$imagen="assets/pages/img/posts/default.jpg";
	if(isset($_POST['imagen'])){
		if(strlen($_POST['imagen'])<27){
			$imagen="assets/pages/img/posts/".$_POST['imagen'];
		}else{
			$imagen=$_POST['imagen'];
		}
		
	}

	try{
		if(BlogDao::sqlExiste($link) > 0){
			$blog=BlogDao::sqlCargar($link);
			$blog->setLink($link2);
			$blog->setImagen($imagen);
			$blog->setCita($cita);

			if(BlogDao::sqlUpdate($blog) > 0){
			?>
				<script>
					alert('Datos de la publicación han sido modificados.');
					window.location.href='../../admPublicaciones-mostrar.php';
				</script>
			<?php
			}else{
			?>
				<script>
					alert('Ha ocurrido un error, los datos no se actualizaron correctamente.<?php echo $link." -A- ".$link2;?>');
					window.location.href='../../admPublicaciones-mostrar.php';
				</script>
			<?php
			}
			
		}else{
			?>
				<script>
					alert('Ha ocurrido un error, La publicación no existe o se encuentra anulada.');
					window.location.href='../../admPublicaciones-mostrar.php';
				</script>
			<?php
				
		}
			
	}catch(Exception $e){
		?>
			<script>
				alert('Ocurrió un error al intentar modificar los datos: <?php echo $e->getMessage(); ?>.');
				window.location.href='../../admPublicaciones-mostrar.php';
			</script>
		<?php
	}
}else{
?>
<script>
alert('Ocurrió un error al registrar los datos: parametros vacíos.');
window.location.href='../../admPublicaciones-mostrar.php';
</script>
<?php	
}

?>