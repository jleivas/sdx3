<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/ProyectoDao.php");
require_once($rootDir . "/int/dao/UsuarioDao.php");

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


if(isset($_POST['link'])){
    $link=$_POST['link'];

	try{
			$proy=ProyectoDao::sqlCargar($link);
			if($proy->getSaldo()==0){
				if(strcmp($proy->getFactura(), "null")===0){
					$proy->setEstado(2);
				}else{
					$proy->setEstado(1);
				}
				
			}else{
				$proy->setEstado(1);
			}
			

			if(ProyectoDao::sqlUpdate($proy) > 0){
			?>
				<script>
					alert('El proyecto ha sido restaurado.');
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