<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/UsuarioDao.php");

$rut="";
if(isset($_POST['rut'])){
        

    
    //A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo
     
    $rut=$_POST['rut'];   
    $usuario1 = UsuarioDao::sqlCargar($rut);
    if($usuario1 != null){
      if($usuario1->getEstado() == 1){
        $para = $usuario1->getMail();
        $titulo = 'Recuperación de contraseña | SOFTDIREX.CL';
         
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
          " Estimado/a ".$usuario1->getNombre().",

        Para terminar el proceso de recuperación de su cuenta en Softdirex,<br>debe hacer clic en el siguiente vínculo:<br><br>".
        "<form action='www.softdirex.cl/recuperar-cuenta.php' method='post'>".
        "<input type='hidden' id='rut' name='rut' maxlength='10' value='".$usuario1->getRut()."'>".
        "<input type='hidden' id='nombre' name='nombre' maxlength='60' value='".$usuario1->getNombre()."'>".
        "<input type='hidden' id='mail' name='mail' maxlength='60' value='".$usuario1->getMail()."'>".
        "<button type='submit' class='boton_personalizado'>Recuperar cuenta</button>".
        "</form>".
          "<br><br><br>".
          "No responda a este correo electrónico. Para comunicarse con nosotros, haga clic en <a href='www.softdirex.cl/page-contacts.html' target='_blank'>Contacto</a><br><br><br>".
          "<hr><h6>Copyright 2017 por Softdirex&nbsp;&nbsp;&nbsp;&nbsp;
                <img align='center' src='http://www.softdirex.cl/assets/img/footer-logo.png'>      ".
          "&nbsp;&nbsp;&nbsp;&nbsp;<a href='www.softdirex.cl' target='_blank' color='Orange'><b>Softdirex</b></a>".
        " Un nuevo concepto para tu empresa</h6>".
        "</div>".
        "</body>".
          "</html>";

        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'From: Softdirex<no-responder@softdirex.cl>';

          
         
         
        @mail($para, $titulo, $mensaje, $cabeceras);  
         

        ?>
                <script>
                  alert('<?php echo $usuario1->getNombre(); ?>: Hemos enviado las instrucciones de recuperación \na su correo electrónico, Gracias por su preferencia!');
                  window.location.href='javascript:history.go(-1);';
                </script>
        <?php

      }else{
        ?>
                <script>
                  alert('<?php echo $usuario1->getNombre(); ?> lo sentimos,\nte encuentras bloqueado.');
                  window.location.href='javascript:history.go(-1);';
                </script>
        <?php
      }
        
    }else{
      ?>
            <script>
              alert('Ha ocurrido un error al enviar la solicitud, porfavor intente mas tarde...');
              window.location.href='../../entrar.php';
            </script>
      <?php
    }
      
}else{
    ?>
            <script>
              alert('Ha ocurrido un error al enviar la solicitud, porfavor intente mas tarde...');
              window.location.href='../../entrar.php';
            </script>
    <?php
}

?>