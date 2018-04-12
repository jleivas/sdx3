<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/InformeDao.php");
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



if(isset($_POST['id'])){
    $proyecto=$_POST['id'];
	$autor="";
	if(isset($_POST['autor'])){
		$autor=$_POST['autor'];
	}
	$fecha=null;
	if(isset($_POST['fecha'])){
		$fecha=$_POST['fecha'];
	}
	$titulo="";
	if(isset($_POST['titulo'])){
		$titulo=$_POST['titulo'];
	}
	$informe="";
	if(isset($_POST['informe'])){
		$informe=nl2br($_POST['informe']);
	}
	$estado=1;
	$id=InformeDao::sqladdId();

	try{
		if(InformeDao::sqlExiste($id) == 0){
			$inf=new Informe($id,$autor, $fecha,$titulo, $informe,$proyecto,$estado);

			if(InformeDao::sqlInsert($inf) > 0){
			?>
				<script>
					alert('El Informe <?php echo $titulo;?> ha sido registrado.');
					window.location.href='javascript:history.go(-2);';
				</script>
			<?php
			}else{
			?>
				<script>
					alert('Ha ocurrido un error, los datos no se registraron correctamente.');
					window.location.href='javascript:history.go(-2);';
				</script>
			<?php
			}
			
		}else{
			?>
				<script>
					alert('Ha ocurrido un error, El informe ya existe.');
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