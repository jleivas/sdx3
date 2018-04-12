<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/ProyectoDao.php");
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
	$nombre="";
	if(isset($_POST['nombre'])){
		$nombre=$_POST['nombre'];
	}
	$imagen="assets/pages/img/works/default.jpg";
	if(isset($_POST['imagen'])){
		if(strlen($_POST['imagen'])<27){
			$imagen="assets/pages/img/works/".$_POST['imagen'];
		}else{
			$imagen=$_POST['imagen'];
		}
		
	}
	$monto=0;
	if(isset($_POST['monto'])){
		$monto=$_POST['monto'];
	}
	$factura="null";
	if(isset($_POST['factura'])){
		$factura=$_POST['factura'];
		if(strlen($factura)<8)
			$factura="null";
	}
	$estado=1;
	if(isset($_POST['estado'])){
		$estado=$_POST['estado'];
	}
	$categoria=0;
	if(isset($_POST['categoria'])){
		$categoria=$_POST['categoria'];
	}

	try{
		if(ProyectoDao::sqlExiste($link) > 0){
			$proy=ProyectoDao::sqlCargar($link);
			$proy->setNombre($nombre);
			$proy->setImagen($imagen);
			$proy->setMonto($monto);
			$proy->setFactura($factura);
			$proy->setEstado($estado);
			$proy->setCategoria($categoria);

			if(ProyectoDao::sqlUpdate($proy) > 0){
			?>
				<script>
					alert('Datos de <?php echo $nombre;?> han sido modificados.');
					window.location.href='../../admProyectos-mostrar.php';
				</script>
			<?php
			}else{
			?>
				<script>
					alert('Ha ocurrido un error, los datos no se actualizaron correctamente.');
					window.location.href='../../admProyectos-mostrar.php';
				</script>
			<?php
			}
			
		}else{
			?>
				<script>
					alert('Ha ocurrido un error, El proyecto no existe o se encuentra anulado.');
					window.location.href='../../admProyectos-mostrar.php';
				</script>
			<?php
				
		}
			
	}catch(Exception $e){
		?>
			<script>
				alert('Ocurrió un error al intentar modificar los datos: <?php echo $e->getMessage(); ?>.');
				window.location.href='../../admProyectos-mostrar.php';
			</script>
		<?php
	}
}else{
?>
<script>
alert('Ocurrió un error al registrar los datos: parametros vacíos.');
window.location.href='../../admProyectos-mostrar.php';
</script>
<?php	
}

?>