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
                            <img src="assets/pages/img/posts/nube.jpg" alt="">
                          </div>
                          <!--<div class="item">
                               
                            <iframe src="http://player.vimeo.com/video/56974716?portrait=0" style="width:100%; border:0" allowfullscreen="" height="259"></iframe>
                            
                          </div>-->
                          <div class="item active">
                            <img src="assets/pages/img/posts/img2.jpg" alt="">
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
                  <h2><a href="">Informática en la nube: El nuevo paradigma del trabajo colaborativo y los negocios</a></h2>
                  <p>Este nuevo paradigma permite que los clientes (consumidores) y las empresas gestionen sus archivos y utilicen aplicaciones sin necesidad de instalarlas. Pero lo más valioso: modelos de trabajo en equipo, siendo su único requisito el estar conectado a internet.</p>
                  <blockquote>
                    <p>Muchos de nosotros escuchamos a menudo la palabra “nube” o “computación en la nube”, pero sin conocer realmente lo que significa y su real impacto en nuestro entorno. El también llamado cloud computing corresponde a sistemas informáticos basados en internet que interactúan por medio de un navegador hacía centros de datos remotos donde gestionamos servicios y aplicaciones.</p>
                    <small>Sergio Román 
                   <cite title="Docente del Área Informática ">IP-CFT Santo Tomás Rancagua</cite></small>
                  </blockquote>                
                  <p>No es necesario disponer de un equipo tan potente, debido a que el dispositivo del usuario no realiza ningún proceso complejo y los ficheros pueden guardarse en la nube. Los servidores en donde se alojan las aplicaciones son los encargados de las tareas complejas que antes se realizaban localmente.</p>
                  <p>Hay que tener claro que la computación en la nube no es una moda, sino que un cambio en el paradigma. Ya no se adquieren aplicaciones para instalarlas, se transforman en un modelo de servicio donde se paga por lo que se utiliza o consume. Esto es una tendencia al alza en los últimos años, que se estima va a crecer un 40% en Latinoamérica en el año próximo, y no tendrá marcha atrás.</p>
                  <p>Muchas empresas han migrado (evolucionado) de sus antiguas soluciones a la nube, lo cual empuja con fuerza al resto, ya que éstas comparten sus experiencias positivas impulsando este modelo. Con esto, muchas empresas de menor envergadura que no contaban con alguna tecnología de información se ven influenciadas a formar parte de esta nueva forma de trabajar. Debemos tener en cuenta que no tan sólo se aplica a los negocios, de igual manera afecta a clientes particulares y estudiantes. Consideremos que simplifica la administración, por ende, acerca a los usuarios finales sin conocimientos muy avanzados a conseguir dichos servicios, ya que no hay que vérselas con la adquisición de licencias, administración de máquinas o centros de datos, servidores o bases de datos, ya que sólo se usa internet para contar con estos servicios a demanda. Los usuarios y/o clientes saben que las soluciones anteriores eran muchas veces costosas y también ineficientes, así que buscan sumarse o migrar a estas soluciones “en la nube”, que son más sencillas, eficientes e incluso hasta más baratas.</p>
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