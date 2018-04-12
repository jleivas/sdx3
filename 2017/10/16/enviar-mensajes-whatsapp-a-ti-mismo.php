<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/int/dao/ComentarioDao.php");
require_once($rootDir . "/int/dao/BlogDao.php");



$anterior = "out";
if(isset($_SERVER['HTTP_REFERER'])){
  $anterior = $_SERVER['HTTP_REFERER'];
}

$dominio= $_SERVER["HTTP_HOST"];
$url= "https://".$dominio .$_SERVER["REQUEST_URI"];

if(BlogDao::sqlExiste($url) == 0){
  ?>
            <script>
              alert('Esta publicación ha sido eliminada. <?php echo $url;?>');
              window.location.href='../../../noticias.php';
            </script>
  <?php
}



$cadena = $url;
$subcadena = "?"; 
  // localicamos en que posici�n se haya la $subcadena, en nuestro caso la posicion es "7"
$posicionsubcadena = strpos ($cadena, $subcadena); 
  // eliminamos los caracteres desde $subcadena hacia la izq, y le sumamos 1 para borrar tambien el @ en este caso
  
$link = substr ($cadena, 0,($posicionsubcadena));
$misRegistros = ComentarioDao::sqlListar($link); 

if(strcmp($anterior, "https://".$dominio."/noticias.php") === 0){
  $cont=1;
}else{
  ?>
    <script>
      window.location.href='<?php echo "https://".$dominio."/noticias.php?contenido=".$url ?>';
    </script>
  <?php
}
?>

<!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-item">
                  <div class="blog-item-img">
                    <!-- BEGIN CAROUSEL -->            
                    <div class="front-carousel">
                      <div id="myCarousel" class="carousel slide">
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                          <div class="item">
                            <img src="assets/pages/img/posts/img4.png" alt="">
                          </div>
                          <!--<div class="item">
                               
                            <iframe src="http://player.vimeo.com/video/56974716?portrait=0" style="width:100%; border:0" allowfullscreen="" height="259"></iframe>
                            
                          </div>-->
                          <div class="item active">
                            <img src="assets/pages/img/posts/img3.jpg" alt="">
                          </div>
                        </div>
                        <!-- Carousel nav -->
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                          <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>                
                    </div>
                    <!-- END CAROUSEL -->             
                  </div>
                  <h2><a href="">Cómo enviar mensajes de WhatsApp a ti mismo</a></h2>
                  <p>Seguro que en más de una ocasión te has enviado un mensaje de correo electrónico a ti mismo para enviarte un enlace con información, una foto o algún recordatorio para que no se te olvide algo. Sin embargo, seguro que muchas veces has pensado en cómo poder enviar mensajes de WhatsApp a ti mismo con recordatorios para no tener que hacerlo por el correo electrónico. La aplicación de mensajería reconoce nuestro número de teléfono y no permite enviar mensajes de WhatsApp a nosotros mismos. Sin embargo, existen algunos trucos para poder enviar mensajes de WhatsApp con recordatorios a ti mismo.</p>
                  <blockquote>
                    <p>Hay una forma de enviarnos mensajes a nosotros mismos sin tener que recurrir a ninguna aplicación de terceros, es decir sin salir de WhatsApp, se trata de un truco bastante sencillo para enviarnos todo tipo de archivos, enlaces o mensajes con recordatorios para tenerlos siempre localizados y poder acceder a ellos fácil y rápidamente. El truco pasa por crear un grupo de WhatsApp con uno de nuestros contactos y automáticamente, nada más crearlo, eliminamos a ese contacto del grupo y por lo tanto, nos quedaremos nosotros solos. Ahora ya podremos enviar a ese grupo en el que únicamente estamos nosotros mismos, todo tipo de mensajes que únicamente estarán a nuestro alcance y no llegarán a nadie más.</p>
                    <small>Roberto Adeva 
                   <cite title="ADSLZone"><a href="https://www.adslzone.net/whatsapp/como-enviar-mensajes-de-whatsapp-con-recordatorios-a-ti-mismo/">ADSLZone</a></cite></small>
                  </blockquote>                
                  <p>Otra opción para enviar mensajes de WhatsApp a ti mismo, es echar mano de una aplicación de terceros como WhatsMy. Se trata de una aplicación gratuita para Windows 10 que permite enviar mensajes de WhatsApp a ti mismo a través de WhatsApp Web.</p>
                  <p><a href="https://www.microsoft.com/en-us/store/p/whatsmy/9n2p7cfd6wwp?ranMID=24542&ranEAID=je6NUbpObpQ&ranSiteID=je6NUbpObpQ-acMVELfZU4FY8lyXQm1jag&tduid=(f8f438d22cc251cdac037faf7dc348c3)(256380)(2459594)(je6NUbpObpQ-acMVELfZU4FY8lyXQm1jag)()#">WhatsMy está disponible para su descarga desde la Tienda de Windows 10</a> en este mismo enlace, por lo tanto, lo primero que tenemos que hacer es instalarla y ejecutarla en nuestro ordenador. Lo primero que veremos nada más lanzarla es una ventana en la que tenemos que indicar un número de teléfono, en este caso el mismo con el que utilizamos WhatsApp, y a continuación el mensaje que queremos enviar.</p>
                  <p>Al pulsar sobre el botón enviar, veremos cómo se abre una ventana de nuestro navegador predeterminada con WhatsApp Web y nos aparecerá un nuevo chat de WhatsApp con nosotros mismos donde recibiremos todos los mensajes enviados a través de WhatsMy. A diferencia de la opción anterior, en este caso vas a tener que usar el ordenador para enviar mensajes de WhatsApp a ti mismo.</p>
                  <ul class="blog-info">
                    <li><i class="fa fa-user"></i> Jorge Leiva CEO Softdirex</li>
                    <li><i class="fa fa-calendar"></i>16-10-2017</li>
                  </ul>

                  <h2>Comentarios</h2>
                  <div class="comments">
                    <?php
                    foreach ($misRegistros as $fila) {
                    ?>
                    <div class="media">                    
                      <a href="" class="pull-left">
                      <img src="../../int/imgPerfil/<?php echo  strtolower(substr($fila['com_autor'], 0, 1));?>.jpg" alt="" class="media-object">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading"><?php echo $fila['com_autor'] ?> <span><?php echo $fila['com_fecha'] ?> / <a href="javascript:;">Reply</a></span></h4>
                        <p><?php echo $fila['com_mensaje'] ?></p>  
                      </div>
                    </div>
                    <?php
                    }
                    ?>
                    <!--end media-->
                  </div>

                  <!--inicio formulario-->
                  <div class="post-comment padding-top-40">
                    <h3>Comenta</h3>
                    <form role="form" action="int/fn/comentar.php" method="post">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" required="">
                        <input type="hidden" name="link" id="link" value="<?php echo $url ?>">
                      </div>

                      <div class="form-group">
                        <label>Email <span class="color-red">*</span></label>
                        <input class="form-control" type="email" name="mail" id="mail" required="">
                      </div>

                      <div class="form-group">
                        <label>Mensaje</label>
                        <textarea class="form-control" rows="8" name="mensaje" id="mensaje" required></textarea>
                      </div>
                      <p><button class="btn btn-primary" type="submit">Comentar</button></p>
                    </form>
                  </div> 
                  <!--fin formulario-->

                </div>
                <!-- END LEFT SIDEBAR -->