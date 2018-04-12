<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/ComentarioDao.php");



if(isset($_POST['id'])){
    $id=$_POST['id'];

	try{
		if(ComentarioDao::sqlExiste($id) > 0){
			$com=ComentarioDao::sqlCargar($id);
			$com->setEstado(0);

			if(ComentarioDao::sqlUpdate($com) > 0){
			?>
				<script>
					alert('El comentario ha sido dado de baja.');
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
					alert('Ha ocurrido un error, El comentario no existe o se encuentra anulado.');
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