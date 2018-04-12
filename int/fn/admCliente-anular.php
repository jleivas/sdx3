<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");



if(isset($_POST['rut'])){
    $rut=$_POST['rut'];

	try{
		if(UsuarioDao::sqlExiste($rut) > 0){
			$usuario1=UsuarioDao::sqlCargar($rut);
			$usuario1->setEstado(0);

			if(UsuarioDao::sqlUpdate($usuario1) > 0){
			?>
				<script>
					alert('<?php echo $usuario1->getNombre();?> ha sido dado de baja.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
			}else{
			?>
				<script>
					alert('Ha ocurrido un error, no se pudo realizar la operación.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
			}
			
		}else{
			?>
				<script>
					alert('Ha ocurrido un error, El usuario no existe o se encuentra bloqueado.');
					window.location.href='javascript:history.go(-1);';
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