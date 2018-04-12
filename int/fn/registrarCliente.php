<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/CorreosDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
$pass1="";
if(isset($_POST['pass1'])){
	$pass1=$_POST['pass1'];
}
$pass2="";
if(isset($_POST['pass2'])){
	$pass2=$_POST['pass2'];
}
if (strcmp($pass1, $pass2) === 0){
    $rut="";
	if(isset($_POST['rut'])){
		$rut=$_POST['rut'];
	}
	$nombre="";
	if(isset($_POST['nombre'])){
		$nombre=$_POST['nombre'];
	}
	$mail="";
	if(isset($_POST['mail'])){
		$mail=$_POST['mail'];
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
	$estado=1;
	$tipo=1;

	//inicio encriptado

	$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
	$salt = strtr($salt, array('+' => '.')); 
	$hash = crypt($pass1, '$2y$10$' . $salt);

	//fin encriptado

	try{
		if(UsuarioDao::sqlExiste($rut) > 0){
			?>
				<script>
					alert('Ocurrió un error al registrar los datos: El usuario ya se encuentra registrado.');
					window.location.href='javascript:history.go(-1);';
				</script>
			<?php
		}else{
			if(CorreosDao::sqlFound($mail) > 0){
				$usuario1 = new Cliente($rut,$hash,$nombre,$mail,$telefono,$direccion,$comuna,$imagen,$tipo,$estado);
				UsuarioDao::sqlInsert($usuario1);
				?>
					<script>
						alert('<?php echo $nombre; ?>: Bienvenido a Softdirex. Disfruta de nuestros servicios online!');
						window.location.href='http://www.softdirex.cl';
					</script>
				<?php
			}else{
				CorreosDao::sqlInsert($mail);
				$usuario1 = new Cliente($rut,$hash,$nombre,$mail,$telefono,$direccion,$comuna,$imagen,$tipo,$estado);
				UsuarioDao::sqlInsert($usuario1);
				?>
					<script>
						alert('<?php echo $nombre; ?>: Bienvenido a Softdirex. Disfruta de nuestros servicios online!');
						window.location.href='http://www.softdirex.cl';
					</script>
				<?php
			}
				
		}
			
	}catch(Exception $e){
		?>
			<script>
				alert('Ocurrió un error al registrar los datos: <?php echo $e->getMessage(); ?>. Póngase en contacto con nosotros.');
				window.location.href='javascript:history.go(-1);';
			</script>
		<?php
	}
}else{
?>
<script>
alert('Ocurrió un error al registrar los datos: Las contraseñas ingresadas no coinciden.');
window.location.href='../../registro.php';
</script>
<?php	
}

?>