<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/CorreosDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
$pass="";
if(isset($_GET['p'])){
	$pass=$_GET['p'];
}

    $rut="";
	if(isset($_GET['r'])){
		$rut=$_GET['r'];
	}
	$nombre="";
	if(isset($_GET['n'])){
		$nombre=$_GET['n'];
	}
	$mail="";
	if(isset($_GET['m'])){
		$mail=$_GET['m'];
	}
	$telefono="";
	if(isset($_GET['f'])){
		$telefono=$_GET['f'];
	}
	$direccion="";
	if(isset($_GET['d'])){
		$direccion=$_GET['d'];
	}
	$comuna="";
	if(isset($_GET['c'])){
		$comuna=$_GET['c'];
	}
	$imagen="int/imgPerfil/".strtolower(substr($nombre, 0, 1)).".jpg";
	$estado=1;
	$tipo=1;

	//inicio encriptado


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
			if(UsuarioDao::sqlFoundRegistro($mail) > 0 && UsuarioDao::sqlFoundMail($mail) == 0){
				if(CorreosDao::sqlFound($mail) > 0){
					$usuario1 = new Cliente($rut,$pass,$nombre,$mail,$telefono,$direccion,$comuna,$imagen,$tipo,$estado);
					UsuarioDao::sqlInsert($usuario1);
					?>
						<script>
							alert('<?php echo $nombre; ?>: Bienvenido a Softdirex. Disfruta de nuestros servicios online!');
							window.location.href='https://www.softdirex.cl/entrar.php';
						</script>
					<?php
				}else{
					CorreosDao::sqlInsert($mail);
					$usuario1 = new Cliente($rut,$pass,$nombre,$mail,$telefono,$direccion,$comuna,$imagen,$tipo,$estado);
					UsuarioDao::sqlInsert($usuario1);
					?>
						<script>
							alert('<?php echo $nombre; ?>: Bienvenido a Softdirex. Disfruta de nuestros servicios online!');
							window.location.href='https://www.softdirex.cl/entrar.php';
						</script>
					<?php
				}
			}else{
				?>
						<script>
							alert('Imposible registrar, No tienes permisos suficientes.');
							window.location.href='https://www.softdirex.cl';
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


?>