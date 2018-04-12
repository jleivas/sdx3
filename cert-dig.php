<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");
require_once($rootDir . "/int/dao/class.phpmailer.php");
session_start();//carga la sesion
if(!$_SESSION){
?>

<script>
alert('Primero debes registrarte o iniciar sesión.');
window.location.href='entrar.php';
</script>
<?php
}

if(isset($_POST['mail'])) {
 
    // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados
 
    $email_to = "jorge.leiva@softdirex.cl";
 
    $email_subject = "Solicitud de Certificado Digital [SOFTDIREX]";   

    $error_message ="";
 
    function died($error) {
 
        // si hay algún error, el formulario puede desplegar su mensaje de aviso
    ?>
        <script>
            alert('Lo sentimos, hubo un error en sus datos:<?php echo $error; ?>');
            window.location.href='javascript:history.go(-1);';
        </script>
<?php

        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['rut']) ||
 
        !isset($_POST['nombre']) ||
 
        !isset($_POST['mail']) ||

        !isset($_POST['estado']) ||
 
        !isset($_POST['direccion']) ||

        !isset($_POST['telefono']) ||

        !isset($_POST['clave']) ||
 
        !isset($_POST['ci'])) {
 
        died('Parece haber un problema con los datos enviados.');       
 
    }
 //En esta parte el valor "name" nos sirve para crear las variables que recolectaran la información de cada campo
    
    $rut = $_POST['rut']; // requerido
 
    $nombre = $_POST['nombre']; // requerido
 
    $mail = $_POST['mail']; // requerido

    $estado = $_POST['estado']; // requerido
 
    $direccion = $_POST['direccion']; // requerido
 
    $telefono = $_POST['telefono']; // requerido

    $clave = $_POST['clave']; // requerido
 
    $ci = $_POST['ci']; // requerido
 
    $mensaje = $_POST['mensaje']; // requerido 

//En esta parte se verifica que la dirección de correo sea válida 
    
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$mail)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.';
 
  }

//En esta parte se validan las cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$nombre)) {
 
    //$error_message .= 'El formato del nombre no es válido<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo

    $email_message = "Tienes una solicitud de certificado digital enviada desde SOFTDIREX.CL.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Rut: ".clean_string($rut)."\n";
 
    $email_message .= "Nombre: ".clean_string($nombre)."\n";
 
    $email_message .= "Email: ".clean_string($mail)."\n";

    $email_message .= "Estado Civil: ".clean_string($estado)."\n";
 
    $email_message .= "Direccion: ".clean_string($direccion)."\n";
 
    $email_message .= "Telefono: ".clean_string($telefono)."\n";

    $email_message .= "Clave: ".clean_string($clave)."\n";
 
    $email_message .= "Numero de Serie CI: ".clean_string($ci)."\n";
 
    $email_message .= "Mensaje: ".clean_string($mensaje)."\n";
  
 
//Se crean los encabezados del correo
 
$headers = 'From: '.$_SESSION['usuario']->getMail()."\r\n".
 
'Reply-To: '.$mail."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 


enviarMail($_SESSION['usuario']->getNombre(),$_SESSION['usuario']->getMail(),$rut,$nombre,$mail,$estado,$direccion,$telefono,$clave,$ci,$mensaje);


}

function enviarMail($nombre,$mail2,$rt,$nm,$ml,$es,$dr,$tl,$cl,$ci,$mn)
{
    
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->Host = "mx1.hostinger.es";
    $mail->From = "no-reply@softdirex.cl";
    $mail->FromName = "Softdirex";
    $mail->Subject = "Instrucciones para finalizar solicitud de certificado digital | SOFTDIREX";
    $mail->IsHTML(true);
    $cont=0;
    // HTML body

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
        "<h1>Su solicitud ha sido enviada a nuestros sistemas.</h1>".
        "<img align='center' src='https://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
        "<br>".
        "</font>".
        "<font color='Orange' face='verdana'>".
          "<h2>Para finalizar tu solicitud<br>".
           "debes adjuntar y enviar la fotocopia del carnet por ambos lados a<br>".
           "<a href='mailto:jorge.leiva@softdirex.cl' target='_blank'><strong>jorge.leiva@softdirex.cl</strong></a></h2><br>".
           "</font>".
           "<font face='verdana'>".
          " <h3>Datos de la solicitud</h3>".
          "<br>Nombre: ".$nm."".
          "<br>Rut: ".$rt."".
          "<br>Numero de serie C/I: ".$ci."".
          "<br>Email: ".$ml."".
          "<br>Estado Civil: ".$es."".
          "<br>Dirección: ".$dr."".
          "<br>Teléfono: ".$tl."".
          "<br>Clave certificado: ".$cl."".
        "</font>".
        "<hr>".
        "<font color='Orange' face='verdana'>".
        "<h3>Entérate de más:</h3>".
        "</font>".
          "<a href='https://www.softdirex.cl/noticias.php' class='boton_personalizado'>Noticias</a><br><br><br>".
        "<font color='Orange' face='verdana'>".
        "<h3>Revise nuestros proyectos:</h3>".
        "</font>".
          "<a href='https://www.softdirex.cl/portafolio.php' class='boton_personalizado'>Portafolio</a><br><br><br>".
          "<hr><h6>Copyright 2017 por Softdirex&nbsp;&nbsp;&nbsp;&nbsp;
                <img align='center' src='https://www.softdirex.cl/assets/img/footer-logo.png'>".
          "&nbsp;&nbsp;&nbsp;&nbsp;<a href='www.softdirex.cl' target='_blank' color='Orange'><b>Softdirex</b></a>".
        " Un nuevo concepto para tu empresa</h6>".
        "<hr>".
        "</div>".
        "</body>".
          "</html>";
    // Configurar Email
    $mail->Body = $mensaje;
    //$mail->AltBody = $text;
    $mail->AddAddress($mail2);
    // Enviar el email
    if($mail->Send()){
        ?>
        <script>
            alert('Gracias por su preferencia! Para finalizar el proceso, revise su correo <?php echo $_SESSION['usuario']->getMail(); ?> y siga las instrucciones.');
            window.location.href='certificado-digital.html';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('Ocurrio un error al intentar enviar la información,\n porfavor intente mas tarde.');
            window.location.href='certificado-digital.html';
        </script>
        <?php
    }
    $mail->ClearAddresses();
    return;
    //------------------------------------------------------------------------------------------------
    
    
}



?>