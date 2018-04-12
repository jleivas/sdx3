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
                            <img src="assets/pages/img/posts/img5.jpg" alt="">
                          </div>
                          <!--<div class="item">
                               
                            <iframe src="http://player.vimeo.com/video/56974716?portrait=0" style="width:100%; border:0" allowfullscreen="" height="259"></iframe>
                            
                          </div>-->
                          <div class="item active">
                            <img src="assets/pages/img/posts/img6.png" alt="">
                          </div>
                          <div class="item">
                            <img src="assets/pages/img/posts/img7.png" alt="">
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
                  <h2><a href="">Redes WIFI bajo ataque en todo el mundo</a></h2>
                  <p>En las últimas horas, ha surgido una noticia devastadora en el área de la informática que puede llegar a afectarte directamente a ti, se trata de una vulnerabilidad de las redes wifi y su cifrado de contraseñas hasta ahora seguro WPA2 descubierto por investigadores de la Universidad de Leuven (Bélgica), bautizado como Krack -Key Reinstallation AttaCK o también llamado KraCK, un conjunto de técnicas eficientes para hackear las redes wifi de todo el mundo, ya sea de tu casa, oficina o cualquier lugar público.</p>
                  <blockquote>
                    <p>No bastara con cambiar la contraseña, por el momento no existe alguna solución aparente pero las grandes empresas como Microsoft ya cuentan con una actualización para sus clientes, Google y Apple están preparándose para entregar una actualización en sus sistemas que pueda solucionar el problema, de momento Apple va más adelantado que Google y ha prometido un parche que estará disponible dentro de los próximos días, sin embargo Linux también ya cuenta con el suyo propio.</p>
                    <small>Jorge Leiva 
                   <cite title="CEO Softdirex"><a href="">Softdirex</a></cite></small>
                  </blockquote>                
                  <p>Lo grave de este fallo en la red wifi es que no solo tu contraseña wifi será robada sino que también pueden ser robados tus datos bancarios, claves de acceso, imágenes enviadas a través de internet ya que deja abiertas las puertas para que se inyecten distintos tipos de virus en tu red para cumplir con estos objetivos. Trae cierta calma el saber que esta vulnerabilidad no es remota sino que sólo es aprovechada si el atacante se encuentra dentro del alcance de tu red wifi.</p>
                  <p>Expertos recomiendan navegar a través de sitios seguros con protocolos  de cifrado https que soportan determinadas páginas web como Softdirex, descargar las últimas actualizaciones de Microsoft y Apple que ya van más adelantados en el tema y por ningún motivo cambiar el sistema WPA2 por otro más inseguro.</p>
                  <ul class="blog-info">
                    <li><i class="fa fa-user"></i> Jorge Leiva CEO Softdirex</li>
                    <li><i class="fa fa-calendar"></i>18-10-2017</li>
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