<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir

$user = $_POST['rut'];
$pass = $_POST['password'];
if(isset($user)){
	
//Ejecutamos sqlDelete pasando la instancia creada 
// Es conveniente pasar la instancia
// Así se pasa encapsulados los datos

	$usuario1 = UsuarioDao::sqlCargar($user);
// sqlFetchActor llena los valores que faltan
// de nuestra instancia Usuario1
//UsuarioDao::sqlFetchUsuario($usuario1);
// Como el método es Static, no es necesario 
// crear una variable de la clase ActorDao

// Desplegamos los valores llenados
	if($usuario1 == null){
		?>
		<script>
		alert('El Rut ingresado no existe.');
		window.location.href='../../entrar.php';
		</script>
		<?php
	}else{
		$dbHash = $usuario1->getPass();
		if (crypt($pass, $dbHash) == $dbHash){
			session_start();
			$_SESSION['usuario'] = $usuario1;
		    if($_SESSION['usuario']->getEstado() == 0){
				session_destroy();
				?>
				<script>
				alert('Lo sentimos <?php echo $_SESSION['usuario']->getNombre(); ?>, te encuentras bloqueado.');
				window.location.href='../../entrar.php';
				</script>
				<?php
			}else{
				if($usuario1->getTipo()==1){
				?>
				<script>
				alert('<?php echo $_SESSION['usuario']->getNombre(); ?>: Bienvenido a Softdirex. Disfruta de nuestros servicios online!');
				window.location.href='../../cuenta.php';
				</script>
				<?php
				}if($usuario1->getTipo()==2){
				?>
				<script>
				alert('<?php echo $_SESSION['usuario']->getNombre(); ?>: Bienvenido a administración Softdirex.');
				window.location.href='../../admin.php';
				</script>
				<?php
				}if($usuario1->getTipo()==3){
				?>
				<script>
				alert('<?php echo $_SESSION['usuario']->getNombre(); ?>: Bienvenido a administración Softdirex.');
				window.location.href='../../admin.php';
				</script>
				<?php
				}	
			}
		}
		else{
		    ?>
			<script>
			alert('La contraseña ingresada es incorrecta.');
			window.location.href='../../entrar.php';
			</script>
			<?php
		}
		
		//$_SESSION['pass'] = $usuario1->getPassword();
		//$_SESSION['tipo'] = $usuario1->getTipo();
		//$_SESSION['activo'] = $usuario1->getActivo();
			
	}
	//echo "Usuario1 Rut : {$usuario1->getRut()}<br>" ;
	
}else{
?>
<script>
alert('Ha ocurrido un error inesperado en la conexión. Por favor, póngase en contacto con nosotros.');
window.location.href='../../entrar.php';
</script>
<?php
}
?>