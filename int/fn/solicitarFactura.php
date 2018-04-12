<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/ProyectoDao.php");

$link="";

if(isset($_POST['link'])){
	$link=$_POST['link'];
     
    //A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo
    $proyecto = ProyectoDao::sqlCargar($link);
    if($proyecto != null){
    	$para = "contacto@softdirex.cl";
	    $titulo = 'Solicitud de factura | SOFTDIREX.CL';
	     
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
	    "<h1>Solicitud de factura.</h1>".
	    "<img align='center' src='http://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
	    "<br>".
	    "</font>".
	    "<font face='verdana'>".
	      " Se ha solicitado una factura a orden del rut: ".$proyecto->getRutCliente().",

	    Nuestro cliente está solicitando una factura correspondiente al proyecto: ".$proyecto->getNombre()."<br>".
	    "Este proyecto se encuentra finalizado y su monto equivale al valor de: $".number_format($proyecto->getMonto())."<br><br>".
	    "Para ver mas detalles, por favor haga clic en el botón: <br><br>".
	    "<a href='".$link."' class='boton_personalizado'>Ver detalles</a>".
	    
	      "<br><br><br>".
	      "No responder a este correo electrónico.<br><br><br>".
	      "<hr>".
      		"Si no puedes acceder directamente al enlace,<br>copia el siguiente link y pégalo en la barra de direcciones de tu navegador:<br>".
      		"copiar: <b><a href='http://www.softdirex.cl".$link."'>http://www.softdirex.cl".$link."</a></b><br>".
      		"<img align='center' src='http://www.softdirex.cl/imgMail/pegar.jpg'><br>".
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
	              alert('Solicitud enviada correctamente,\nsu factura estará disponible dentro de las próximas 24 horas.');
	              window.location.href='javascript:history.go(-1);';
	            </script>
	    <?php

	    }else{
	    ?>
	            <script>
	              alert('Ha ocurrido un error al enviar la solicitud,\nporfavor intente mas tarde...');
	              window.location.href='javascript:history.go(-1);';
	            </script>
	    <?php
	    }

    
         
    
}else{
    	?>
	            <script>
	              alert('Ha ocurrido un error al enviar la solicitud,\nporfavor póngase en contacto con softdirex.');
	              window.location.href='javascript:history.go(-1);';
	            </script>
	    <?php
}

?>