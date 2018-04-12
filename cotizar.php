<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/class.phpmailer.php");

if(isset($_POST['link'])){
  $link = $_POST['link'];
}else{
  $link="";
}


if(isset($_POST['title'])){
  $title = $_POST['title'];
}else{
  $title = "";
}

if(isset($_POST['mail'])) {
    $mail2 = $_POST['mail']; // requerido
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
 
  if(!preg_match($email_exp,$mail2)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }

//En esta parte se validan las cadenas de texto

 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo
  $mail = new PHPMailer();
  $mail->CharSet = 'UTF-8';
  $mail->Host = "mx1.hostinger.es";
  $mail->From = "no-reply@softdirex.cl";
  $mail->FromName = "Softdirex";
  $mail->Subject = "Cotizacion | SOFTDIREX.CL";
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
"<h1>Cotización</h1>".
"<img align='center' src='https://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
"<br>".
"</font>".
"<font face='verdana'>".
  "haz clic en el siguiente enlace para ver los precios:<br><br> <h2><a href='".$link."?mail=".$mail2."'>".$title."</a></h2>".
"</font>".
"<font color='Orange' face='verdana'>".
"<h3>Revisa nuestras publicaciones:</h3>".
"</font>".
  "<a href='https://www.softdirex.cl/noticias.php' class='boton_personalizado'>Noticias</a><br><br><br>".
  "No responda a este correo electrónico. Para comunicarse con nosotros, haga clic en <a href='www.softdirex.cl/page-contacts.html'>Contacto</a><br><br><br>".
  "<hr>".
      "Si no puedes acceder directamente al enlace,<br>copia el siguiente link y pégalo en la barra de direcciones de tu navegador:<br>".
      "copiar: <b><a href='".$link."'>".$link."?mail=".$mail2."</a></b><br>".
      "<img align='center' src='https://www.softdirex.cl/imgMail/pegar.jpg'><br>".
  "<hr><h6>Copyright 2017 por Softdirex&nbsp;&nbsp;&nbsp;&nbsp;
  <img align='center' src='https://www.softdirex.cl/assets/img/footer-logo.png'>".
  "&nbsp;&nbsp;&nbsp;&nbsp;<a href='www.softdirex.cl' color='Orange'><b>Softdirex</b></a>".
" Un nuevo concepto para tu empresa</h6>".
"</div>".
"</body>".
  "</html>";

  // Configurar Email
  $mail->Body = $mensaje;
  //$mail->AltBody = $text;
  $mail->AddAddress($mail2);
  // Enviar el email
  if(!$mail->Send()) {
  ?>
      <script>
        alert('Error al enviar cotización a: <?php echo $mail2; ?>.');
      </script>
  <?php
  }else{
    $mail->ClearAddresses();
?>
        <script>
          alert('Hemos enviado la información a su correo electrónico, Gracias por su preferencia!');
          window.location.href='javascript:history.go(-1);';
        </script>
<?php
  }
  

  
 
 

}else{
?>
        <script>
          alert('Ha ocurrido un error al enviar la solicitud, porfavor intente mas tarde...');
          window.location.href='javascript:history.go(-1);';
        </script>
<?php
}



?>