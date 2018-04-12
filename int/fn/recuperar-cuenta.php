<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");



if(isset($_POST['rut'])){
    $rut=$_POST['rut'];
	$pass1="";
	if(isset($_POST['pass1'])){
		$pass1=$_POST['pass1'];
	}
	$pass2="";
	if(isset($_POST['pass2'])){
		$pass2=$_POST['pass2'];
	}

	try{
		if(UsuarioDao::sqlExiste($rut) > 0){
			$usuario1=UsuarioDao::sqlCargar($rut);
			if (strcmp($pass1, $pass2) === 0){
					//inicio encriptado

					$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
					$salt = strtr($salt, array('+' => '.')); 
					$hash = crypt($pass1, '$2y$10$' . $salt);

					//fin encriptado
					$usuario1->setPass($hash);
					if(UsuarioDao::sqlUpdate($usuario1) > 0){
					?>
						<script>
							alert('Tu contraseña ha sido actualizada.');
							window.location.href='../../entrar.php';
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
						alert('Ocurrió un error al modificar la contraseña: Las contraseñas ingresados no coinciden.');
						window.location.href='javascript:history.go(-1);';
					</script>
				<?php
			}
			
		}else{
			?>
				<script>
					alert('Ha ocurrido un error, El usuario no existe o se encuentra bloqueado.');
					window.location.href='../../index.php';
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
alert('Ocurrió un error al actualizar los datos: parametros vacíos.');
window.location.href='javascript:history.go(-1);';
</script>
<?php	
}

?>