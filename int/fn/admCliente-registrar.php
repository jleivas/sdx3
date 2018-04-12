<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/CorreosDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
	$pass="";
	if(isset($_POST['pass'])){
		$pass=$_POST['pass'];
	}
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
	$tipo=1;
	if(isset($_POST['tipo'])){
		$tipo=$_POST['tipo'];
	}
	$imagen="int/imgPerfil/".strtolower(substr($nombre, 0, 1)).".jpg";
	$estado=1;

	//inicio encriptado

	$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
	$salt = strtr($salt, array('+' => '.')); 
	$hash = crypt($pass, '$2y$10$' . $salt);

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
				enviarMail($mail,$rut,$nombre,$pass);
				?>
					<script>
						alert('Usuario registrado exitosamente.');
						window.location.href='javascript:history.go(-1);';
					</script>
				<?php
			}else{
				CorreosDao::sqlInsert($mail);
				$usuario1 = new Cliente($rut,$hash,$nombre,$mail,$telefono,$direccion,$comuna,$imagen,$tipo,$estado);
				UsuarioDao::sqlInsert($usuario1);
				?>
					<script>
						alert('Usuario registrado exitosamente.');
						window.location.href='javascript:history.go(-1);';
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


function enviarMail($mail,$rut,$nombre,$pass)
{
	$para = $mail;
    $titulo = 'Bienvenido a Softdirex.cl';
     
    $mensaje = "<html>".
    "<head>".
    "<style type='text/css'>".
      ".boton_personalizado{".
        "text-decoration: none;".
        "padding: 10px;".
        "font-weight: 600;".
        "font-size: 20px;".
        "color: #ffffff;".
        "background-color: #ff8000;".
        "border-radius: 10px;".
        "border: 2px #0016b0;".
      "}".
       ".boton_personalizado:hover{".
        "color: #ff8000;".
        "background-color: #ffffff;".
      "}".
      ".bloque {".
      "background-color: #fafafa;".
      "margin: 1rem;".
      "padding: 1rem;".
      "text-align: center;".
    "}".
    "</style>".
    "</head>".
    "<body>".
    "<div class='bloque' style='width:100%; height:auto;'>".
    "<font color='Orange' face='verdana'>".
    "<h1>Nuevo usuario registrado</h1>".
    "<img align='center' src='http://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
    "<br>".
    "</font>".
    "<font face='verdana'>".
      " Estimado/a ".$nombre.",

    Su cuenta en Softdirex ha sido creada exitosamente.<br><br>".
    "Si eres cliente y estamos desarrollando un proyecto para tí. <br>Podrás ver tus proyectos, revisar su avance, precios, informes, <br>efectuar pagos online, solicitar y descargar facturas.<br><br>".
    "Queremos que te sientas importante para nosotros, en nuestro portal estarás al tanto de todos <br>nuestros servicios y publicaciones. <br><br>Bienvenido.".
    
    "<font color='Orange' face='verdana'>".
    "<h1>Los datos de acceso son:</h1>".
    "<br>".
    "</font>".
    "Rut Usuario:".$rut."<br>".
    "Contraseña:".$pass."<br><br><br><br>".
    "<a href='https://www.softdirex.cl/entrar.php' class='boton_personalizado'>Iniciar sesión</a><br><br><br>".
      "<br><p><small><b>Le recomendamos cambiar su contraseña.</b></small></p><br><br>".
      "No responda a este correo electrónico. Para comunicarse con nosotros, haga clic en <a href='www.softdirex.cl/page-contacts.html'>Contacto</a><br><br><br>".
      "<hr>".
      "Si no puedes acceder directamente al enlace,<br>copia el siguiente link y pégalo en la barra de direcciones de tu navegador para finalizar tu registro:<br>".
      "copiar: <b><a href='www.softdirex.cl/entrar.php'>www.softdirex.cl/entrar.php</a></b><br>".
      "<img align='center' src='http://www.softdirex.cl/imgMail/pegar.jpg'><br>".
      "<hr><h6>Copyright 2017 por Softdirex&nbsp;&nbsp;&nbsp;&nbsp;
            <img align='center' src='http://www.softdirex.cl/assets/img/footer-logo.png'>      ".
      "&nbsp;&nbsp;&nbsp;&nbsp;<a href='www.softdirex.cl' color='Orange'><b>Softdirex</b></a>".
    " Un nuevo concepto para tu empresa</h6>".
    "</div>".
    "</body>".
      "</html>";

    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $cabeceras .= 'From: Softdirex<no-responder@softdirex.cl>';

      
     
     
    @mail($para, $titulo, $mensaje, $cabeceras);
	
}

?>