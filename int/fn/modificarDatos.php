<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");



if(isset($_POST['rut'])){
    $rut=$_POST['rut'];
	$nombre="";
	if(isset($_POST['nombre'])){
		$nombre=$_POST['nombre'];
	}
	$telefono="";
	if(isset($_POST['telefono'])){
		$telefono=$_POST['telefono'];
	}
	$direccion="";
	if(isset($_POST['direccion'])){
		$direccion=$_POST['direccion'];
	}
	$comuna="";
	if(isset($_POST['comuna'])){
		$comuna=$_POST['comuna'];
	}
	$imagen="int/imgPerfil/".strtolower(substr($nombre, 0, 1)).".jpg";

	try{
		if(UsuarioDao::sqlExiste($rut) > 0){
			$usuario1=UsuarioDao::sqlCargar($rut);
			$usuario1->setNombre($nombre);
			$usuario1->setTelefono($telefono);
			$usuario1->setDireccion($direccion);
			$usuario1->setComuna($comuna);
			$usuario1->setImagen($imagen);

			if(UsuarioDao::sqlUpdate($usuario1) > 0){
			?>
				<script>
					alert('<?php echo $nombre;?>: Tus datos han sido modificados.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
			}else{
			?>
				<script>
					alert('<?php echo $nombre;?>: Ha ocurrido un error, los datos no se actualizaron correctamente.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
			}
			
		}else{
			?>
				<script>
					alert('Ha ocurrido un error, El usuario no existe o se encuentra bloqueado.');
					window.location.href='www.softdirex.cl';
				</script>
			<?php
				
		}
			
	}catch(Exception $e){
		?>
			<script>
				alert('Ocurrió un error al intentar modificar los datos: <?php echo $e->getMessage(); ?>. Póngase en contacto con nosotros.');
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