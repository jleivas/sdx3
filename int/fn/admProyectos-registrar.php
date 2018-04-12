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
		$imagen= "assets/pages/img/works/".$_POST['imagen'];
	}
	$monto=0;
	if(isset($_POST['monto'])){
		$monto=$_POST['monto'];
	}
	$categoria=0;
	if(isset($_POST['categoria'])){
		$categoria=$_POST['categoria'];
	}
	$cliente="";
	if(isset($_POST['cliente'])){
		$cliente=$_POST['cliente'];
	}

	try{
		if(ProyectoDao::sqlExiste($link) == 0){
			$id = ProyectoDao::sqladdId();
			$proy=new Proyecto($id,$link, $nombre,$imagen, $monto,$monto,$categoria,2,"null", $cliente);

			if(ProyectoDao::sqlInsert($proy) > 0){
			?>
				<script>
					alert('El proyecto <?php echo $nombre;?> ha sido registrado.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
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
					alert('Ha ocurrido un error, El proyecto ya existe.');
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

?>