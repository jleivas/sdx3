<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/CorreosDao.php");



if(isset($_POST['rut2'])){
    $rut=$_POST['rut2'];
	$correo="";
	if(isset($_POST['correo'])){
		$correo=$_POST['correo'];
	}
	$mail1="";
	if(isset($_POST['mail1'])){
		$mail1=$_POST['mail1'];
	}
	$mail2="";
	if(isset($_POST['mail2'])){
		$mail2=$_POST['mail2'];
	}

	try{
		if(UsuarioDao::sqlExiste($rut) > 0){
			$usuario1=UsuarioDao::sqlCargar($rut);
			if (strcmp($mail1, $mail2) === 0){
				
				if (strcmp($usuario1->getMail(), $correo) === 0){
					$usuario1->setMail($mail1);
					if(UsuarioDao::sqlUpdate($usuario1) > 0){
						if(CorreosDao::sqlFound($mail1) == 0){
							CorreosDao::sqlInsert($mail1);
						}
					?>
						<script>
							alert('Tu correo de acceso ha sido actualizado.');
							window.location.href='javascript:history.go(-1);';
						</script>
					<?php
					}else{
					?>
						<script>
							alert('Ha ocurrido un error, los datos no se actualizaron correctamente.');
							window.location.href='javascript:history.go(-1);';
						</script>
					<?php
					}
				}else{
					?>
						<script>
							alert('No se pudo actualizar los datos: EL correo actual ingresado no es válido.');
							window.location.href='javascript:history.go(-1);';
						</script>
					<?php
				}
			}else{
				?>
					<script>
						alert('Ocurrió un error al modificar el correo: Los correos ingresados no coinciden.');
						window.location.href='javascript:history.go(-1);';
					</script>
				<?php
			}
			
		}else{
			?>
				<script>
					alert('Ha ocurrido un error, El usuario no existe o se encuentra bloqueado.');
					window.location.href='http://www.softdirex.cl';
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