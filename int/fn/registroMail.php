<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");

date_default_timezone_set("Chile/Continental");
$hoy = date('j-m-y H:i:s');
$ahora = date('H:i:s');

$pass1="";
if(isset($_POST['pass1'])){
  $pass1=$_POST['pass1'];
}
$pass2="";
if(isset($_POST['pass2'])){
  $pass2=$_POST['pass2'];
}



if (strcmp($pass1, $pass2) === 0){
    $salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
    $salt = strtr($salt, array('+' => '.')); 
    $hash = crypt($pass1, '$2y$10$' . $salt);

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

    if(isset($_POST['mail'])) {
        $mail = $_POST['mail']; // requerido
        // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados
       

        $error_message ="";
     
        function died($error) {
     
            // si hay algún error, el formulario puede desplegar su mensaje de aviso
     
            header("Location: notif.php?notif=Lo sentimos, hubo un error en sus datos:".$error);
            die();
        }
     
        // Se valida que los campos del formulairo estén llenos
     
        
     //En esta parte el valor "name" nos sirve para crear las variables que recolectaran la información de cada campo
       

    //En esta parte se verifica que la dirección de correo sea válida 
        
       $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
     
      if(!preg_match($email_exp,$mail)) {
     
        $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
     
      }

    //En esta parte se validan las cadenas de texto

     
      if(strlen($error_message) > 0) {
     
        died($error_message);
     
      }
     
    //A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo
     
         
    $para = $mail;
    $titulo = 'Confirmación de registro | SOFTDIREX.CL';
     
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
    "<h1>Confirme su correo electrónico.</h1>".
    "<img align='center' src='http://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
    "<br>".
    "</font>".
    "<font face='verdana'>".
      " Estimado/a ".$nombre.",

    Para terminar el registro de su cuenta en Softdirex,<br>debe hacer clic en el siguiente vínculo:<br><br>".
    "<form action='www.softdirex.cl/int/fn/registrarCliente.php' method='post'>".
    "<input type='hidden' id='rut' name='rut' maxlength='10' value='".$rut."'>".
    "<input type='hidden' id='nombre' name='nombre' maxlength='60' value='".$nombre."'>".
    "<input type='hidden' id='mail' name='mail' maxlength='60' value='".$mail."'>".
    "<input type='hidden' id='telefono' name='telefono' maxlength='12' value='".$telefono."'>".
    "<input type='hidden' id='direccion' name='direccion' maxlength='60' value='".$direccion."'>".
    "<input type='hidden' id='comuna' name='comuna' maxlength='60' value='".$comuna."'>".
    "<input type='hidden' id='pass1' name='pass1' maxlength='25' value='".$pass1."'>".
    "<input type='hidden' id='pass2' name='pass2' maxlength='25' value='".$pass2."'>".
    "<button type='submit' class='boton_personalizado'>Confirmar correo</button>".
    "<p><small><b>Debe confirmar para enviar la información a nuestra página externa.</b></small></p>".
    "</form>".
      "<br><br><br>".
      "No responda a este correo electrónico. Para comunicarse con nosotros, haga clic en <a href='www.softdirex.cl/page-contacts.html'>Contacto</a><br><br><br>".
      "<hr>".
      "Si no puedes acceder directamente al enlace,<br>copia el siguiente link y pégalo en la barra de direcciones de tu navegador para finalizar tu registro:<br>".
      "copiar: <b><a href='www.softdirex.cl/rg.php?r=".$rut."&n=".$nombre."&m=".$mail."&f=".$telefono."&d=".$direccion."&c=".$comuna."&p=".$hash."'>www.softdirex.cl/rg.php?r=".$rut."&n=".$nombre."&m=".$mail."&f=".$telefono."&d=".$direccion."&c=".$comuna."&p=".$hash."</a></b><br>".
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
     
    UsuarioDao::sqlHoraRegistro($hoy,$hoy,$mail);
    ?>
            <script>
              alert('<?php echo $nombre; ?>: Hemos enviado la información a su correo electrónico.\nPara finalizar el registro de cliente, Gracias por su preferencia!');
              window.location.href='javascript:history.go(-2);';
            </script>
    <?php

    }else{
    ?>
            <script>
              alert('Ha ocurrido un error al enviar la solicitud, porfavor intente mas tarde...');
              window.location.href='javascript:history.go(-2);';
            </script>
    <?php
    }
}else{
?>
<script>
alert('Ocurrió un error al registrar los datos: Las contraseñas ingresadas no coinciden.');
window.location.href='javascript:history.go(-1);';
</script>
<?php 
}

?>